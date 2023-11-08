@extends('layouts.template')
@section('content')
    <section class="container mt-5 mb-5 p-5 mx-auto my-auto col-md-12 col-lg-12 col-xl-12 border border-2 rounded shadow">
        <h2 class="text-center"> BIODATA DIRI </h2>
        <header class="mt-5 d-flex row col-auto ">
            <section class="row col-sm-8 col-md-8 col-lg-12 col-xl-11 mx-auto my-auto justify-content-center">
                <img src="{{ asset('assets/images/profile_2.jpg') }}" class="img-fluid rounded-circle col-12 col-sm-11 col-md-6 col-lg-4 col-xl-3" alt="profil" />
                <section class="mt-auto col-12 col-sm-12 col-md-10 col-lg-6 col-xl-6">
                    <table class="table table-borderless fs">
                        <tbody class="text-start">
                            <tr>
                                <td scope="row" class="baris">Nama </td>
                                <td scope="row"> : </td>
                                <td>Agfinita Gusti Hikmawani</td>
                            </tr>
                            <tr>
                                <td scope="row" class="baris">Tempat, tanggal lahir </td>
                                <td scope="row"> : </td>
                                <td scope="row">Lumajang, 27 Maret 2003</td>
                            </tr>
                            <tr>
                                <td scope="row" class="baris">Alamat </td>
                                <td scope="row"> : </td>
                                <td scope="row">Candipuro, Lumajang</td>
                            </tr>
                            <tr>
                                <td scope="row" class="baris">Telepon </td>
                                <td scope="row"> : </td>
                                <td scope="row">0858-9516-8097</td>
                            </tr>
                            <tr>
                                <td scope="row" class="baris">E-mail </td>
                                <td scope="row"> : </td>
                                <td scope="row"><a href="https://mail.google.com/"
                                        class="text-decoration-none">agfinitaagh@gmail.com</a></td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </header>
        <hr>

        <article class="mt-4">
            <h4>Overview</h4>
            <p class="text-wrap fs">Hi, saya seorang mahasiswa semester 5 Jurusan D3 Teknologi Informasi Politeknik Negeri
                Malang di Lumajang.</br>
                Walaupun saya dari jurusan IT namun saya masih sangat awam dengan dunia IT khususnya pemrograman.
                Ketika mengerjakan sebuah projek di kampus, sisi frontend dibangun menggunakan HTML, CSS, dan Javascript.
                Sedangkan, sisi backend menggunakan bahasa pemrograman Javascript. Beberapa framework yang digunakan yaitu
                Bootstrap dan React.</br> Nah, saat ini saya sedang belajar Laravel untuk pertama kalinya!</p>
        </article>

        <section class="mt-5 mx-auto my-auto">
            <h4>Skils & Experiences</h4>
            <table class="table table-bordered fs">
                <thead class="table-secondary">
                    <tr class="text-center">
                        <th scope="col" class="col-width"> Skills </th>
                        <th scope="col" class="col-width"> Experiences </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">
                            <ul>
                                <li>HTML (intermediate)</li>
                                <li>CSS (intermediate)</li>
                                <li>Javascript (beginner)</li>
                                <li>PHP (beginner)</li>
                                <li>MySQL (beginner)</li>
                            </ul>
                        </td>
                        <td scope="row">
                            <ul>
                                <li>Peserta PKM-K Tahun 2023</li>
                                <li>Lomba desain UI/UX Forkafest UM Jember</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>
@endsection
