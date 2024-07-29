<?php
    session_start(); 
    include "lib.php";
    include "css/style.css";


    $idx = $_POST['idx'];
    $idx = mysqli_real_escape_string($connect, $idx);

    $query = "select * from list where idx='$idx' ";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    $user_id = $_SESSION['isLoginId'];
    $user_id = mysqli_real_escape_string($connect, $user_id);

    $query = " select * from member where user_id='$user_id' "; 
    $result = mysqli_query($connect, $query);
    $user_data = mysqli_fetch_array($result);
    
?>


<form action="writePost.php" method="post">
    <input type="hidden" name="idx" value="<?=$idx?>">
    <!--<table width=800 border="1" cellpadding=5 >-->

    <div class="board_wrap">
        <div class="board_title">
            <strong>게시판</strong>
            <p>자신의 결과를 공유해 보세요!</p>
        </div>

        <div class="board_write_wrap">
            <div class="board_write">
                <div class="title">
                  <dl>
                    <dt>제목</dt>
                    <dd><input type="text" placeholder="제목 입력" name="subject"  style="width:360%; "  value="<?=$data['subject']?>"  ></dd>
                  </dl>
                </div>
                <div class="info">
                    <dl>
                        <dt>글쓴이</dt>
                        <dd> <?=$user_data['name']?> </dd> 
                    </dl>
                    <dl>
                      <dt>비밀번호</dt>
                        <dd> <dd><input type="password" name="pwd" placeholder="비밀번호"  size=20 ></dd> </dd>

                    </dl>
                </div>
                <div class="cont">
                    <textarea name="memo" placeholder="내용 입력" style="width:100%; height:300px;"><?=$data['memo']?></textarea>
                </div>
            </div>

            <div class="bt_wrap">
                  <input type="submit" value="저장">
                  <a href="list.php">취소</a>
            </div>
          </div>
          </div>
      </table>
  </form>
