function masonryLayout(containerElem, itemsElem, columns) {
    containerElem.classList.add('masonry-layout', `columns-${columns}`)
    let columnsElements = []

    for (let i = 1; i <= columns; i++){
        let column = document.createElement('div')
        column.classList.add('mansory-column',`column-${i}`)
        containerElem.appendChild(column)
        columnsElements.push(column)
    }

    for (let m = 0; m < Math.ceil(itemsElem.length / columns); m++){
        for (let n = 0; n < columns; n++) {
            let item = itemsElem[m * columns + n]
            columnsElements[n].appendChild(item)  
            item.classList.add('masonry-item')   
        }
    }
    
}

masonryLayout(document.getElementById('gallery'), document.querySelectorAll('.gallery-item'), 4)