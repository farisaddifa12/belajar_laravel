<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
@extends('mapels.layouts')
<body style="background: white">
@section ('content')
    <h1>Form Absensi</h1>

    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col" class="text-center">Kehadiran</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <form action="" method="POST">
            @foreach ($absensis as $absensi)
                <tr class="table-info">
                    <td>
                        <label class="" name="id" for="inlineFormInputName2">{{ $absensi->id }}</label>
                    </td>
                    <td>
                        <label class="" name="nama" for="inlineFormInputGroupUsername2">{{ $absensi->title }}</label>
                    </td>
                    <td>
                        <label class="" name="id_kelas" for="inlineFormInputGroupUsername3">{{ $absensi->id_kelas }}</label>
                    </td>
                    <td class="text-center">
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <input type="hidden" name="kehadiran" value="">
                                <input type="hidden" name="idmahasantri[]" value="51">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1151" name="absensi0"
                                        class="custom-control-input" value="hadir">
                                    <label class="custom-control-label" for="customRadioInline1151">Hadir</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2151" name="absensi0"
                                        class="custom-control-input" value="sakit">
                                    <label class="custom-control-label" for="customRadioInline2151">Sakit</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline3151" name="absensi0"
                                        class="custom-control-input" value="ijin">
                                    <label class="custom-control-label" for="customRadioInline3151">Ijin</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline4151" name="absensi0"
                                        class="custom-control-input" value="alpha">
                                    <label class="custom-control-label" for="customRadioInline4151">Alpha</label>
                                </div>
                            </div>
                            <div class="col-12">
                            </div>
                        </div>
                    </td>
                    <td>
                        <input type="text" autocomplete="off" name="keterangan" class="form-control ">
                    </td>
                </tr>
                </tr>
                @endforeach
                </form>
            </tbody>
        </table>
        <div class="tenor-gif-embed" data-postid="25351062" data-share-method="host" data-aspect-ratio="1.33333" data-width="50%"><a href="https://tenor.com/view/darimana-duitnya-darimana-duitnya-money-uang-gif-25351062">Darimana Duitnya GIF</a>from <a href="https://tenor.com/search/darimana-gifs">Darimana GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
    </div>
    @endsection