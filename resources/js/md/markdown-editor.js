import "simplemde/dist/simplemde.min.css"
import * as SimpleMDE from "simplemde/dist/simplemde.min"

const simpleMDE = new SimpleMDE({
    element: document.getElementById('mdEditor'),
    showIcons: ['code', 'table']
})