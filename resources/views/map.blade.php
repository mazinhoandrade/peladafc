<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Kumar+One');
        @import url('https://fonts.googleapis.com/css?family=Merriweather');

        *{
            box-sizing:border-box;
        }

        body{
            background-image: url(https://static.pexels.com/photos/399187/pexels-photo-399187.jpeg);
            background-size: cover;
            background-position: center;
        }
        main{
            display: flex;
            justify-content: flex-start;
        }
        header{
            height: 300px;
            margin-top: 50px;
            background-image: url("https://www.chemicalcode.com/dose/wp-content/uploads/2016/02/CUP_gif01_v1.gif");
            background-position: center;
            background-size: 50%;
            background-repeat: no-repeat;

        }

        .bench{

            margin-left: 100px;
            margin-top: 140px;
            list-style: none;
            z-index: 20;
        }

        .pitch{
            position:relative;
            background-image: url(http://www.conceptdraw.com/How-To-Guide/picture/soccer-football-field-templates/End-Zone-View-Soccer-Football-Field.png);
            opacity: 0.9;
            background-repeat: no-repeat;
            background-position: center;
            /* background-size: 70%; */
            width: 80%;
            margin-left: 100px;
            margin-top: 50px;
            list-style: none;

        }


        .joueur{

            display: flex;
            flex-direction: column-reverse;
            background-size: cover;
            background-position: center;

        }

        .joueur.titulaire{
            position: absolute;
            height: 150px;
            width: 8%;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;

        }

        .joueur.banc{

            margin: 20px;
            height: 150px;
            width: 100%;
            text-decoration: none;
        }

        .coach{
            margin:20px;
            height: 150px;
            width: 100%;
            text-decoration: none;
            display: flex;
            flex-direction: column-reverse;
            background-size: cover;
            background-position: center;
        }

        #degea{
            background-image: url("http://bola828.org/wp-content/uploads/2014/06/David-De-Gea.jpg");

        }


        #terry{
            background-image: url( "http://1.bp.blogspot.com/-SSUavJqwFjA/USzF_RFZLII/AAAAAAAAFf4/amiiENNm1XA/s1600/John+Terry+Wallpapers+(2).jpg")
        }

        #eriksen{
            background-image: url( "http://e0.365dm.com/13/09/800x600/christian-eriksen-tottenham-hotspur_3009509.jpg?20130925124507")
        }

        #kane{
            background-image: url( "http://cdn.images.express.co.uk/img/dynamic/67/590x/Harry-Kane-726302.jpg")
        }



        #coach{
            background-image: url( "http://www.squawka.com/news/wp-content/uploads/2016/10/Antonio-Conte.jpg")
        }

        #courtois{
            background-image: url( "https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Courtois_aug_2014.jpg/220px-Courtois_aug_2014.jpg");
            left: 46%;
            bottom: 12%;
        }

        #valencia{
            background-image: url( "http://www.manutd.com/sitecore/shell/~/media/448687E1B9584B4D9802C77263161978.ashx?w=240&h=311&rgn=0,0,2000,2592");
            right: 25%;
            bottom: 35%;
        }

        #bailly{
            background-image: url( "http://www.manutd.com/sitecore/shell/~/media/3B48A0E0FEB34426A396A49DB4EEE218.ashx?w=240&h=311&rgn=13,0,1993,2562");
            left: 40%;
            bottom: 30%;
        }

        #matip{
            background-image: url( "http://www.edennewspaper.net/wp-content/uploads/2016/02/57147_2_201273015563143.jpg");
            right: 40%;
            bottom: 30%;
        }

        #baines{
            background-image: url( "http://img.uefa.com/imgml/TP/players/14/2010/324x324/95588.jpg");
            left: 25%;
            bottom: 35%;
        }

        #kante{
            background-image: url( "http://www.planetepsg.com/divers/un_interet_pour_kante_0422055325.jpg");
            left: 56%;
            top: 36%;
        }

        #pogba{
            background-image: url( "http://www.sofoot.com/IMG/img-pogba-sa-coupe-de-cheveux-et-ses-fans-1472396000_580_380_center_articles-261378.jpg");
            left: 36%;
            top: 36%;
        }

        #hazard{
            background-image: url( "https://static.independent.co.uk/s3fs-public/styles/article_small/public/thumbnails/image/2016/12/26/16/eden-hazard.jpg");
            left: 30%;
            top: 15%;
        }

        #alli{
            background-image: url( "https://www.thesun.co.uk/wp-content/uploads/2016/10/dele-alli-7.jpg?w=620&strip=all");
            left: 46%;
            top: 24%;
        }

        #coutinho{
            background-image: url( "http://cdn.sports.fr//images/media/football/transferts/articles/coutinho-une-cible-prioritaire-pour-le-barca/philippe_coutinho_reu/19916015-1-fre-FR/philippe_coutinho_reu_w484.jpg");
            right: 30%;
            top: 15%;
        }

        #lukaku{
            background-image: url( "http://www.africatopsports.com/wp-content/uploads/2015/12/lukaku.jpg");
            left: 46%;
            top: 7%;
        }
        .textebas{
            display:flex;
            flex-direction: row;
            background-color: rgba(36, 255, 180, 1);
            justify-content: center;
            color: rgba(90, 59, 180, 1);
            border-radius: 3px;
            padding: 1.9px;
            font-family: 'Merriweather', serif;
        }
    </style>
</head>
<body>
<header>
</header>

<main>
    <ul class="bench">
        <li>
            <div><a href="https://www.premierleague.com/players/4330/David-de-Gea/overview" class="joueur banc"
                    id="degea">
                    <div class="textebas">De gea</div>
                </a></div>
        </li>
        <li>
            <div><a href="https://www.premierleague.com/players/1353/John-Terry/overview" class="joueur banc"
                    id="terry">
                    <div class="textebas">Terry</div>
                </a></div>
        </li>
        <li>
            <div><a href="https://www.premierleague.com/players/4845/Christian-Eriksen/overview" class="joueur banc"
                    id="eriksen">
                    <div class="textebas">Eriksen</div>
                </a></div>
        </li>
        <li>
            <div><a href="https://www.premierleague.com/players/3960/Harry-Kane/overview" class="joueur banc" id="kane">
                    <div class="textebas">Kane</div>
                </a></div>
        </li>

        <li>
            <div><a href="https://www.premierleague.com/managers/5556/Antonio-Conte/overview" class="coach banc"
                    id="coach">
                    <div class="textebas">A.Conte</div>
                </a></div>
        </li>
    </ul>
    <ul class="pitch">
        <li>
            <div><a href="https://www.premierleague.com/players/4911/Thibaut-Courtois/overview" class="joueur titulaire"
                    id="courtois">
                    <div class="textebas">Courtois</div>
                </a></div>
        </li>
        <li>
            <div><a href="https://www.premierleague.com/players/3285/Antonio-Valencia/overview" class="joueur titulaire"
                    id="valencia">
                    <div class="textebas">Valencia</div>
                </a></div>
        </li>
        <li>
            <div><a href="https://www.premierleague.com/players/12937/Eric-Bailly/overview" class="joueur titulaire"
                    id="bailly">
                    <div class="textebas">Bailly</div>
                </a></div>
        </li>
        <li>
            <div><a href="https://www.premierleague.com/players/5375/Joel-Matip/overview" class="joueur titulaire"
                    id="matip">
                    <div class="textebas">Matip</div>
                </a></div>
        </li>
        <li>
            <div><a href="https://www.premierleague.com/players/3030/Leighton-Baines/overview" class="joueur titulaire"
                    id="baines">
                    <div class="textebas">Baines</div>
                </a></div>
        </li>
        <li>
            <div><a href="https://www.premierleague.com/players/13492/N'Golo-Kant%C3%A9/overview"
                    class="joueur titulaire" id="kante">
                    <div class="textebas">Kanté</div>
                </a></div>
        </li>
        <li>
            <div><a href="https://www.premierleague.com/players/3920/Paul-Pogba/overview" class="joueur titulaire"
                    id="pogba">
                    <div class="textebas">Pogba</div>
                </a></div>
        </li>
        <li>
            <div><a href="https://www.premierleague.com/players/4503/Eden-Hazard/overview" class="joueur titulaire"
                    id="hazard">
                    <div class="textebas">Hazard</div>
                </a></div>
        </li>
        <li>
            <div><a href="https://www.premierleague.com/players/9167/Dele-Alli/overview" class="joueur titulaire"
                    id="alli">
                    <div class="textebas">Alli</div>
                </a></div>
        </li>
        <li>
            <div><a href="https://www.premierleague.com/players/4525/Philippe-Coutinho/overview"
                    class="joueur titulaire" id="coutinho">
                    <div class="textebas">Coutinho</div></div>
            </a></div></li>
        <li>
            <div><a href="https://www.premierleague.com/players/4290/Romelu-Lukaku/overview" class="joueur titulaire"
                    id="lukaku">
                    <div class="textebas">Lukaku</div>
                </a></div>
        </li>
    </ul>
</main>
<script
    src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</body>
</html>
