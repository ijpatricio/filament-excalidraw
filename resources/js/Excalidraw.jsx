import React, { forwardRef, useEffect, useImperativeHandle, useState } from 'react'
import { Excalidraw as ExcalidrawApp, MainMenu } from "@excalidraw/excalidraw";
// import { testData } from '../../../../mingle/resources/js/testData';
import './styles.css';

/*
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
*/


const Excalidraw = forwardRef(({ wire, ...props }, ref) => {
    //const message = props.mingleData.message
    // console.log(props.initialData);

    const [excalidrawAPI, setExcalidrawAPI] = useState(null);
    const [libraryItems, setLibraryItems] = useState(null);

    useEffect(() => {
        if (!excalidrawAPI) {
            return;
        }
        //publishing the excalidrawAPI to window
        //api.getAppState(), api.getSceneElements(),
        window.api = excalidrawAPI;
    }, [excalidrawAPI]);

    const saveSceneData = () => {
        if (!excalidrawAPI) {
            return;
        }
        const appState = excalidrawAPI.getAppState();

        props.onSave({
            elements: excalidrawAPI.getSceneElements(),
            appState: {
                zenModeEnabled: appState.zenModeEnabled,
                viewModeEnabled: appState.viewModeEnabled,
                viewBackgroundColor: appState.viewBackgroundColor,
                theme: appState.theme,
            },
            libraryItems: libraryItems,
            files: excalidrawAPI.getFiles(),
        });
    }

    const close = () => {
        props.close();
    }

    const renderMenu = () => {
        return (
            <MainMenu>
                <MainMenu.ItemCustom>
                    <button
                        className="button"
                        onClick={() => {
                            console.log("saving scene data");
                            saveSceneData();
                        }}
                    >
                        Save
                    </button>
                </MainMenu.ItemCustom>

                <MainMenu.ItemCustom>
                    <button
                        className="button"
                        onClick={() => {
                            close();
                        }}
                    >
                        Close
                    </button>
                </MainMenu.ItemCustom>

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
        )
    }

    useImperativeHandle(ref, () => ({
        saveSceneData: saveSceneData,
    }));

    return (
        <div style={{ height: "100vh", width: "100vw" }}>
            <ExcalidrawApp
                onChange={(elements, appState, files) => {
                    /*
                    //excalidrawAPI might be null
                    if(appState.viewModeEnabled === false){
                        excalidrawAPI.updateScene({appState: {viewModeEnabled: true}});
                    }
                    */
                }}
                excalidrawAPI={(api) => setExcalidrawAPI(api)}
                initialData={props.initialData}
                onLibraryChange={(items) => setLibraryItems(items)}
            >{renderMenu()}</ExcalidrawApp>
        </div>
    )
});

export default Excalidraw;
