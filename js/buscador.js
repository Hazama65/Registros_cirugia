document.getElementById('search-input').addEventListener('keyup', function() {
    var input = this.value.toLowerCase();
    var rows = document.getElementById('table-body').getElementsByTagName('tr');
    
    for (var i = 0; i < rows.length; i++) {
        var rowData = rows[i].innerText.toLowerCase();
        
        if (rowData.indexOf(input) === -1) {
            rows[i].style.display = 'none';
        } else {
            rows[i].style.display = '';
        }
    }
});