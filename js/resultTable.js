document.addEventListener('DOMContentLoaded', function () {
    // Elemento onde a tabela será exibida
    var resultTable = document.getElementById('resultTable');
  
    // Realize uma solicitação AJAX para buscar os dados do arquivo JSON
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'consulta.php', true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Analise os dados JSON
        var jsonData = JSON.parse(xhr.responseText);
  
        // Crie a tabela
        var table = document.createElement('table');
        table.innerHTML = `
          <thead>
            <tr>
              <th>Candidato</th>
              <th>Votos</th>
            </tr>
          </thead>
          <tbody>
            ${jsonData.map(function (data) {
              return `
                <tr>
                  <td>${data.candidato}</td>
                  <td>${data.votos}</td>
                </tr>
              `;
            }).join('')}
          </tbody>
        `;
  
        // Limpe o conteúdo anterior e insira a nova tabela
        resultTable.innerHTML = '';
        resultTable.appendChild(table);
      }
    };
    xhr.send();
  });
  