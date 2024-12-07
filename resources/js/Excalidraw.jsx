import React, { forwardRef, useEffect, useImperativeHandle, useState } from 'react'
import { Excalidraw, MainMenu, loadFromBlob, serializeAsJSON } from '@excalidraw/excalidraw'
import * as CustomMenuItems from './Menu/CustomMenuItems.jsx'
import { testData } from './testData'
import './styles.css'

window.testData = testData
/******************************************************************************
 saveData: {
 elements: ExcalidrawElement[],
 appState: AppState,
 libraryItems: LibraryItems | Promise<LibraryItems>,
 files: BinaryFiles
 }

 loadData: {
 elements: ExcalidrawElement[],
 appState: AppState,
 scrollToContent: boolean,
 libraryItems: LibraryItems | Promise<LibraryItems>,
 files: BinaryFiles
 }
 ******************************************************************************/

const ExcalidrawCustom = forwardRef(({ wire, ...props }, ref) => {

    const [excalidrawAPI, setExcalidrawAPI] = useState(null)
    const [libraryItems, setLibraryItems] = useState(null)

    const closeMenu = () => {
        excalidrawAPI.updateScene({ appState: { openMenu: null } })
    }

    const updateScene = async (data) => {

        if (data === false) {
            alert('Failed to load Whiteboard.')
            return
        }

        try {
            // First update scene
            await excalidrawAPI.updateScene({
                elements: data.elements,
            });

            // Then add Files
            await excalidrawAPI.addFiles(
                Object.values(data.files)
            )

        } catch (error) {
            console.error('Error updating scene:', error)
        }

        excalidrawAPI.setToast({
            message: 'Whiteboard loaded successfully',
            closable: true,
            duration: 3000,
        })
    }


    useEffect(() => {
        if (!excalidrawAPI) {
            return
        }

        // Publishing the excalidrawAPI to window
        window.api = excalidrawAPI
    }, [excalidrawAPI])

    useEffect(() => {

        // Register the event listener
        const unsubscribe = Livewire.on('boot-whiteboard-with', () => {

            wire.loadData().then(updateScene)
        })

        // Cleanup function to remove the event listener
        return () => unsubscribe()
    })

    const onClose = () => {
        if (!excalidrawAPI) {
            return
        }
        closeMenu()
        Livewire.dispatch('close-modal', { id: 'edit-whiteboard-modal' })
    }

    const saveSceneData = () => {
        if (!excalidrawAPI) {
            return
        }

        const appState = excalidrawAPI.getAppState()

        const payload = {
            elements: excalidrawAPI.getSceneElements(),
            appState: {
                zenModeEnabled: appState.zenModeEnabled,
                viewModeEnabled: appState.viewModeEnabled,
                viewBackgroundColor: appState.viewBackgroundColor,
                theme: appState.theme,
            },
            libraryItems: libraryItems,
            files: excalidrawAPI.getFiles(),
        }

        wire.save(payload).then(data => {
            if (data === true) {
                closeMenu()
                return
            }

            alert('Failed to save the Whiteboard')
        })
    }

    useImperativeHandle(ref, () => ({
        saveSceneData: saveSceneData,
    }))

    return (
        <div style={{ height: '100vh', width: '100vw' }}>
            <Excalidraw
                onChange={(elements, appState, files) => {
                    /*
                    //excalidrawAPI might be null
                    if(appState.viewModeEnabled === false){
                        excalidrawAPI.updateScene({appState: {viewModeEnabled: true}})
                    }
                    */
                }}
                excalidrawAPI={(api) => setExcalidrawAPI(api)}
                onLibraryChange={(items) => setLibraryItems(items)}
            >
                <MainMenu>
                    <CustomMenuItems.CloseMenuItem onClick={onClose} />
                    <CustomMenuItems.SaveMenuItem onClick={saveSceneData} />
                    <MainMenu.DefaultItems.LoadScene />
                    <MainMenu.DefaultItems.SaveToActiveFile />
                    <MainMenu.DefaultItems.Export />
                    <MainMenu.DefaultItems.SaveAsImage />
                    <MainMenu.DefaultItems.Help />
                    <MainMenu.DefaultItems.ClearCanvas />
                    <MainMenu.Separator />
                    <MainMenu.DefaultItems.ToggleTheme />
                    <MainMenu.DefaultItems.ChangeCanvasBackground />
                </MainMenu>
            </Excalidraw>
        </div>
    )
})

export default ExcalidrawCustom
