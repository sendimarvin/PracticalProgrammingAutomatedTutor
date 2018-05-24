var problemName = "";
function loadProblem(probId) {
    var value1 = document.getElementById(probId).innerText.match(/^.*$/m)[0];;
    var queryString = "?para1="+value1;
    window.location.href = "problem/problem.php"+queryString;   
}

var queryString2 = decodeURIComponent(window.location.search);
queryString2 = queryString2.substring(1); 
