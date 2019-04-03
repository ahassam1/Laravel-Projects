<script>
function getBook() {
    var book_id = document.getElementById("book_id").value;

    if (mode == "") {
        document.getElementById("schoolText").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("schoolText").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","searchSchools.php?mode=" + mode + "&sector=" + sector + "&keyword=" + keyword, true);
        xmlhttp.send();
    }
}
</script>

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

                            <select>
                            <option data-id="a" value="a">a</option>
                            <option data-id="b" value="b">b</option>
                            <option data-id="c" value="c">c</option>
                            </select>

                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

                            <script type="text/javascript">

                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                            $('select').change(function(){
                            var data = $(this).children('option:selected').data('id');

                            $.ajax({
                                url: '/api/books',
                                type: 'POST',
                                data: {_token: CSRF_TOKEN},
                                dataType: 'JSON',
                                success: function (data) {
                                    console.log(data);
                                }
                            });
                            </script>


                    <div>
                </div>
            </div>
        </div>
    </div>
</div>