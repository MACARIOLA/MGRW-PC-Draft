
const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

// 1. Searching for specific data of HTML table
search.addEventListener('input', searchTable);

function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    })

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}
        // JavaScript functions to show and hide image preview
        function showPreview() {
            document.getElementById("preview").style.display = "block";
        }

        function hidePreview() {
            document.getElementById("preview").style.display = "none";
        }

        
        ///
        
        function toggleEdit() {
            const editButton = document.getElementById('edit-button');
            const tableCells = document.querySelectorAll('tbody td');
            
            if (editButton.classList.contains('editing')) {
                // Finish editing
                editButton.classList.remove('editing');
                tableCells.forEach(cell => {
                    const input = cell.querySelector('input');
                    if (input) {
                        // Save the new value
                        cell.textContent = input.value;
                    }
                });
            } else {
                // Start editing
                editButton.classList.add('editing');
                tableCells.forEach(cell => {
                    const text = cell.textContent.trim();
                    cell.innerHTML = `<input type="text" value="${text}">`;
                });
            }
        }
        
            
