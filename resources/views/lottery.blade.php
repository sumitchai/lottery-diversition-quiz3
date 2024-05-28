<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lottery Diversition</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/') }}/css/lottery.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <div class="col-12 col-sm-12 col-md-12">
                <h1>Lottery Diversition</h1>
            </div>
        </div>
    </nav>
    <div class="page_wrapper">
        <div class="container">
            <div class="border">
                <div class="row mt-4">
                    <div class="col-1 col-sm-1 col-md-3"></div>
                    <div class="col-10 col-sm-10 col-md-4">
                        <a href="lottery" id="random" class="btn btn-primary">ดำเนินการสุ่มรางวัล</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-1 col-sm-1 col-md-3"></div>
                    <div class="col-10 col-sm-10 col-md-6">
                        <table class="table td-border">
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p> <strong>รางวัลที่ 1</strong></p>
                                    </td>
                                    <td>
                                        <p> {{ $lottery_one }} </p>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <p> <strong>รางวัลข้างเคียงรางวัลที่ 1</strong></p>
                                    </td>
                                    <td>
                                        <p> {{ $side_lottery_one_1 }} </p>
                                    </td>
                                    <td>
                                        <p> {{ $side_lottery_one_2 }} </p>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <p> <strong>รางวัลที่ 2</strong></p>
                                    </td>
                                    <td>
                                        <p> {{ $lottery_two_1 }} </p>
                                    </td>
                                    <td>
                                        <p> {{ $lottery_two_2 }} </p>
                                    </td>
                                    <td> {{ $lottery_two_3 }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p> <strong>รางวัลเลขท้าย 2 ตัว</strong></p>
                                    </td>
                                    <td>
                                        <p> {{ $last_lottery_two }} </p>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div> 

                @if (!empty($success))
                <div class="row">
                    <div class="col-1 col-sm-1 col-md-3"></div>
                    <div class="col-10 col-sm-10 col-md-6">
                        <div class="alert alert-success"> {{ $success }}</div>
                    </div>
                </div>
                @endif

                @if (!empty($error))

                <div class="row">
                    <div class="col-1 col-sm-1 col-md-3"></div>
                    <div class="col-10 col-sm-10 col-md-6">
                        <div class="alert alert-danger"> {{ $error }}</div>
                    </div>
                </div>
                @endif

                <div class="row">
                    <form action="" method="get">
                        {{-- @csrf --}}
                        <div class="row">
                            <div class="col-1 col-sm-1 col-md-3"></div>
                            <div class="col-10 col-sm-10 col-md-6">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 mt-2">
                                        <div class="form-group">
                                            <label for="lottery">ตรวจรางวัลลอตเตอรี่ Diversition</label>
                                            <input type="number" name="lottery" class="form-control mt-2" placeholder="กรอกหมายเลขของท่าน" value="{{ $key }}"
                                                id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 mt-2 text-center">
                                        <button type="submit" class="btn btn-success">ตรวจรางวัล</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row mb-4"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>