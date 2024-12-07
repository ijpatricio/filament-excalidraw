import React from 'react'

export function SaveMenuItem(props) {
    return (
        <button
            title="Save"
            data-testid="save-button"
            aria-label="Save"
            type="button"
            className="dropdown-menu-item dropdown-menu-item-base"
            onClick={props.onClick}
        >
            <div className="dropdown-menu-item__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"
                     className="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M14 4l0 4l-6 0l0 -4" />
                </svg>
            </div>
            <div className="dropdown-menu-item__text">Save</div>
            <div className="dropdown-menu-item__shortcut"></div>
        </button>
    )
}

export function CloseMenuItem(props) {
    return (
        <button
            data-testid="load-button"
            aria-label="Close"
            type="button"
            className="dropdown-menu-item dropdown-menu-item-base"
            title="Close"
            onClick={props.onClick}
        >
            <div className="dropdown-menu-item__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"
                     className="icon icon-tabler icons-tabler-outline icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </div>
            <div className="dropdown-menu-item__text">Close</div>
            <div className="dropdown-menu-item__shortcut"></div>
        </button>
    )
}
