<?php
  require_once 'config/connect.php';

  $read_info = mysqli_query($connect, "SELECT * FROM `read`");
  $heroes_info = mysqli_query($connect, "SELECT * FROM `heroes`");
  $quotes_info = mysqli_query($connect, "SELECT * FROM `quotes`");

?>



<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Прочитанно</title>
    <link rel="stylesheet" href="css/style.css" />
    <style>
      .add-hero {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
      }

      .input {
        max-width: 400px;
        min-width: 100px;
        width: 100%;
        height: 25px;
        border: 1px solid #000;
        border-radius: 3px;
        margin: 0 0 10px 0;
      }

      .add {
        width: 150px;
        border-radius: 3px;
        border: 1px solid #000;
      }

      .cards {
        justify-content: space-between;
      }

    </style>
  </head>
  <body>
    <div class="wrapper">
      <header>
        <nav class="nav">
          <div class="logo_txt">
            <a href="index.php">khorek</a>
          </div>
          <div class="logo_img">
            <a href="index.php"><img src="./images/logo.png" alt="" /></a>
          </div>
          <div class="menu">
            <a href="read.php">Прочитанно</a>
            <a href="progress.php">Читается</a>
            <a href="unread.php">Непрочитанно</a>
          </div>
        </nav>
      </header>
      <main>
        <div class="cards">
          <?php foreach ($read_info as $data_read): ?>
          <div class="border-body-card">
            <div class="body-card">
              <img src="<?= $data_read['img']; ?>" alt="" />
              <p class="name" style="font-size: 18px; line-height: 20px;"><?= $data_read['name']; ?></p>
              <p class="author" style="line-height: 20px; margin: 2px 0 19px 0;"><?= $data_read['author']; ?></p>
              <div class="body-card-a">
                <a class="a" href="#modalP<?= $data_read['id']; ?>">Сюжет</a>
                <div id="modalP<?= $data_read['id']; ?>" class="modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title">Название</h3>
                        <a href="#close" title="Close" class="close">×</a>
                      </div>
                      <div class="modal-body">
                        <p><?= $data_read['plot']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <a class="a" href="#modalQ<?= $data_read['id']; ?>">Цитаты</a>
                <div id="modalQ<?= $data_read['id']; ?>" class="modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title">Название</h3>
                        <a href="#close" title="Close" class="close">×</a>
                      </div>
                      <div class="modal-body">
                        <p>Содержимое модального окна...</p>
                      </div>
                    </div>
                  </div>
                </div>
                <a class="a" href="#modalH<?= $data_read['id']; ?>">Герои</a>
                <div id="modalH<?= $data_read['id']; ?>" class="modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title">Название</h3>
                        <a href="#close" title="Close" class="close">×</a>
                      </div>
                      <div class="modal-body">
                        <?php foreach ($heroes_info as $data_h): ?>
                        <ul class="li-h">
                          <?php 
                              if ($data_h['book'] == $data_read['name']) {
                            ?>
                          <li>
                            <h3><?= $data_h['hero']; ?></h3>
                            <p><?= $data_h['description']; ?></p>
                          </li>
                            <?php
                              }
                            ?>
                        </ul>
                        <?php endforeach; ?>
                        <form action="vendor/create.php" method="post">
                          <div class="add_hero">
                            <input type="text" name="hero" id="" class="hero input" placeholder="Герой">
                          <textarea type="text" name="description" id="" class="description input" placeholder="Описание"></textarea>
                          <textarea type="text" name="book" id="" class="book_name input" placeholder="Название книги"></textarea>
                          <button class="add" type="submit">Добавить</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </main>
      <footer>
        <script src="./js/script.js"></script>
      </footer>
    </div>
  </body>
</html>
