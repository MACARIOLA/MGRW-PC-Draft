
const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');


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
    
        function showPreview() {
            document.getElementById("preview").style.display = "block";
        }

        function hidePreview() {
            document.getElementById("preview").style.display = "none";
        }

        
function toggleClick() {
  const navContainer = document.getElementById("nav-container");
  if (navContainer.style.left === '-800px') {
    navContainer.style.left = '0';
  } else {
    navContainer.style.left = '-800px';
  }
}