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

                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                                $(document).ready(function(){
                                  $("button").click(function(){

                                    $.ajaxSetup({
                                         headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });

                                   $.ajax({
                                        url: '/api/books',
                                        type: 'POST',
                                        data: { "books" : "books"},
                                        dataType: 'JSON',
                                       success:function(data) {
                                          $("#msg").html(data.msg);
                                       },
                                       error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status);
                                        alert(thrownError);
                                       }
                                    });;
                                  });
                                });
                            </script>

                            <button>Get External Content</button>

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