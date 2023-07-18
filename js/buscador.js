document.getElementById('search-input').addEventListener('keyup', function() {
    let input = this.value.toLowerCase();
    let rows = document.getElementById('table-body').getElementsByTagName('tr');
    
    for (let i = 0; i < rows.length; i++) {
        let rowData = rows[i].innerText.toLowerCase();
        
        if (rowData.indexOf(input) === -1) {
            rows[i].style.display = 'none';
        } else {
            rows[i].style.display = '';
        }
    }
});