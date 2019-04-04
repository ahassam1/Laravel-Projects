<html>
<head>
<script>
function showBookImage() {
	var book_id = document.getElementById("book_id").value;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("bookinfo").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","/api/books/id/" + book_id, true);
    xmlhttp.send();
}

function showBookByISBN() {
    var book_isbn = document.getElementById("book_isbn").value;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("bookinfo").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","/api/books/isbn/" + book_isbn, true);
    xmlhttp.send();
}

function showAllBooks() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("bookinfo").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","/api/books", true);
    xmlhttp.send();
}

function showAllAuthors() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("bookinfo").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","/api/authors", true);
    xmlhttp.send();
}

</script>

</head>
<body>

<button onclick="showBookImage()"> Find Book By ID </button>
<form>
	<div class="field">
	        <label for="keyword">Book ID:</label>
	        <input type="number" id="book_id" name="book_id" value="1">
	</div>
</form>

<button onclick="showBookByISBN()"> Find Book By ISBN </button>
<form>
    <div class="field">
            <label for="keyword">Book ISBN:</label>
            <input type="number" id="book_isbn" name="book_isbn" value="2005018">
    </div>
</form>

<button onclick="showAllBooks()"> List All Books </button>
<button onclick="showAllAuthors()"> List All Authors </button>

<br>

<div id="bookinfo"><b>Book info will be listed here...</b></div>

</body>
</html>