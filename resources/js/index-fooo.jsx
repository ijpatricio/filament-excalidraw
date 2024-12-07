import React from 'react'
import {createRoot} from 'react-dom/client'
import Excalidraw from './Excalidraw.jsx'
import { testData } from './testData.js'

export default async (el, wire) => {
    const root = createRoot(el)

    const ref = React.createRef()

    const onSave = (data) => {
        console.log("save data: ", data)

        const sizeInKbytes = (
            new TextEncoder()
                .encode(JSON.stringify(data))
                .length
            / 1024
        ).toFixed(2)

        console.log(sizeInKbytes + " KB")

        wire.store(data)
    }

    const close = () => {
        console.log("close button pressed")
        window.Livewire.dispatch('close-modal', {id: 'edit-whiteboard-modal'})
    }

    const whiteboardData = await wire.load()

    console.log(whiteboardData)

    let initialData = {...testData, scrollToContent: true}

    initialData = {...whiteboardData, scrollToContent: false}

    root.render(<Excalidraw
        wire={wire}
        mingleData={{}}
        onSave={onSave}
        ref={ref}
        initialData={initialData}
        close={close}/>
    )
}

