@extends('layouts/main')

@section('contenido')
<a href="/" class="btn btn-info btn-block mt-3 col-12">
    <td class="icocod">&#9194;</td> Regresar
</a>
    <p class="fs-2 text-center mt-4"><img src="{{ asset('img/tec.ico') }}" alt="Icono" style="width: 55px; height: auto;"></td> Actividades de los creditos</p>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
        <div class="col">
            <div class="card h-100 text-white"  style="background-color: #c25fdb;">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://scontent.fmex1-4.fna.fbcdn.net/v/t39.30808-6/312370022_100216166245401_3525175972336899187_n.jpg?_nc_cat=107&cb=99be929b-59f725be&ccb=1-7&_nc_sid=730e14&_nc_ohc=9BEZccHtv4YAX9cMlar&_nc_ht=scontent.fmex1-4.fna&oh=00_AfCWTopxDCiZEBQUF_FrEijqgsQsB-VrAjWrIifuQojnMQ&oe=648A7379" style="height: 310px;">
                        </div>
                        <div class="carousel-item">
                            <img src="https://scontent.fmex1-1.fna.fbcdn.net/v/t39.30808-6/314070126_100216046245413_1416947405036398607_n.jpg?_nc_cat=106&cb=99be929b-59f725be&ccb=1-7&_nc_sid=730e14&_nc_ohc=2pwqIGkw5B8AX__dSn3&_nc_ht=scontent.fmex1-1.fna&oh=00_AfAl7oRWaRBD9IEgf4_OCaD2lF8l-UwnFZhL0GGKJGSfhA&oe=648AC1C5" style="height: 310px;">
                        </div>
                        <div class="carousel-item">
                            <img src="https://scontent.fmex1-4.fna.fbcdn.net/v/t39.30808-6/312323099_100216036245414_6715438501252189907_n.jpg?_nc_cat=108&cb=99be929b-59f725be&ccb=1-7&_nc_sid=730e14&_nc_ohc=OUQN-YXDxWkAX-aQ-3c&_nc_ht=scontent.fmex1-4.fna&oh=00_AfBr57S06lk1TE8Ij-z85hvqlExE3rd_FdN-Rke-_zgqOQ&oe=648C20E1" style="height: 310px;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Crédito cultural:</h5>
                    <p class="card-text">El crédito cultural, lo puedes concluir con algunas actividades como:</p>
                    <ul>
                        <li>
                          Eventos como día de muertos:
                          <ul>
                            <li>Ofrenda</li>
                            <li>Tapete</li>
                            <li>Calavera literaria</li>
                          </ul>
                        </li>
                        <li>Otro evento</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <small class="text-muted"></small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100  text-white"  style="background-color: #5f5fdb;">
                <div id="carouselExampleIndicators1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://scontent.fmex1-4.fna.fbcdn.net/v/t39.30808-6/333567057_671520208080500_7873174578745384180_n.jpg?_nc_cat=107&cb=99be929b-59f725be&ccb=1-7&_nc_sid=730e14&_nc_ohc=akX5QrD3dqcAX8FgWHp&_nc_ht=scontent.fmex1-4.fna&oh=00_AfApjy9HY6Ff69dzz46gZ2xIDpeZfO1o7-VAijndLZR2DQ&oe=648AB6DD" style="height: 310px;">
                        </div>
                        <div class="carousel-item">
                            <img src="https://scontent.fmex1-1.fna.fbcdn.net/v/t39.30808-6/327788331_2254812634698780_4371570203085370916_n.jpg?_nc_cat=106&cb=99be929b-59f725be&ccb=1-7&_nc_sid=730e14&_nc_ohc=Vz-1D6KcLuQAX_mFTtV&_nc_ht=scontent.fmex1-1.fna&oh=00_AfAZ6Uu2l_dOYWj7R7aIR4_8S7mR9g_exCclRWB_5rPMTA&oe=648A8571" style="height: 310px;">
                        </div>
                        <div class="carousel-item">
                            <img src="https://scontent.fmex1-6.fna.fbcdn.net/v/t39.30808-6/329681489_483293620475443_4816252366958759325_n.jpg?_nc_cat=111&cb=99be929b-59f725be&ccb=1-7&_nc_sid=730e14&_nc_ohc=WmmMS341BOkAX_j6lEJ&_nc_ht=scontent.fmex1-6.fna&oh=00_AfDV3I7ACQfxkFpiTXP5LSKO7WedGCULmkXbhGIr87qt5A&oe=648B1FCF" style="height: 310px;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                
                <div class="card-body">
                    <h5 class="card-title text-center">Crédito cívico:</h5>
                    <p class="card-text">Este crédito se puede liberar con las siguientes actividades:</p>
                    <ul>
                        <li>
                          Eventos como:
                          <ul>
                            <li>Desfiles</li>
                            <li>Banda de guerra</li>
                          </ul>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <small class="text-muted"></small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100  text-white"  style="background-color: #e9533c;">
                <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://scontent.fmex1-5.fna.fbcdn.net/v/t39.30808-6/336242854_575059867909275_8444070194434833346_n.jpg?_nc_cat=103&cb=99be929b-59f725be&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=UWnRRX7ngt4AX9RZFjt&_nc_ht=scontent.fmex1-5.fna&oh=00_AfAOqQZEgc-710CbNO5yoS1L9NcKRZvl7eOUK5hRQ43gkg&oe=648A564F" style="height: 310px;">
                        </div>
                        <div class="carousel-item">
                            <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/348388567_3659337904296469_3164656944107832700_n.jpg?stp=dst-jpg_p206x206&_nc_cat=108&cb=99be929b-59f725be&ccb=1-7&_nc_sid=aee45a&_nc_ohc=6J0s0Wngm20AX--xJnh&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdSTBKnU3aTGxHUe2Sw6p6uQPc16ydD6ifBMBaxsz-FAJw&oe=64ADCCF1" style="height: 310px;">
                        </div>
                        <div class="carousel-item">
                            <img src="https://scontent.fmex1-2.fna.fbcdn.net/v/t39.30808-6/334812652_195579856443075_978230436852657815_n.jpg?_nc_cat=100&cb=99be929b-59f725be&ccb=1-7&_nc_sid=730e14&_nc_ohc=-xJy1tNH4qcAX9dduaa&_nc_ht=scontent.fmex1-2.fna&oh=00_AfBYmhIvxV57PxpLe05TqPoBUXv6w_9-V11Ymi3M9HJ3-g&oe=648BB9DF" style="height: 310px;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <img src="">
                <div class="card-body">
                    <h5 class="card-title text-center">Crédito deportivo:</h5>
                    <p class="card-text">Este crédito lo puedes concluir con las siguientes actividades:</p>
                    <ul>
                        <li>
                          Eventos como:
                          <ul>
                            <li>Fútbol</li>
                            <li>Básquetbol</li>
                            <li>Ajedrez</li>
                            <li>Game class</li>
                          </ul>
                        </li>
                        <li>Algunas actividades de los pilares de Miacatlán y Tepenahuac</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <small class="text-muted"></small>
                </div>
            </div>
        </div>
    </div>
  
@endsection
