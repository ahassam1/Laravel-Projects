<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in the BookView section! <br>
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
                            <script type="text/javascript">
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
                                            document.getElementById("msg").innerHTML = this.responseText;
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
                                            document.getElementById("msg").innerHTML = this.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET","/api/books/isbn/" + book_isbn, true);
                                    xmlhttp.send();
                                }

                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                                $(document).ready(function(){
                                  $("#externalContentButton").click(function(){
                                    $.ajaxSetup({
                                         headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });
                                   $.ajax({
                                        type: 'GET',
                                        url: '/api/books',
                                        dataType: 'json',
                                        data: {},
                                       success:function(data) {
                                        $.each(data.data, function(i, item)
                                        {
                                          $("#msg").append(item.id);
                                          $("#msg").append("<br>");
                                          $("#msg").append(item.name);
                                          $("#msg").append("<br>");


                                        })
                                       },
                                       error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status);
                                        alert(thrownError);
                                       }
                                    });;
                                  });
                                });
                            </script>

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

                            <button id="externalContentButton">Get External Content</button>
                           <body>
                                  <div id = 'msg'>This message will be replaced using Ajax. 
                                     Click the button to replace the message.</div>
                          </body>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>