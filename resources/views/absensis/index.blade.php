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

<body style="background: white">
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
            @foreach ($absensis as $absensi)
                <tr class="table-info">
                    <td>
                        <label class="" for="inlineFormInputName2">1</label>
                    </td>
                    <td>
                        <label class="" for="inlineFormInputGroupUsername2">{{ $absensi->title }}</label>
                    </td>
                    <td>
                        <label type="" autocomplete="off" name="" class="">
                    </td>
                    <td class="text-center">
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <input type="hidden" name="" value="">
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
                        <input type="text" autocomplete="off" name="keterangan0" class="form-control ">
                    </td>
                </tr>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>