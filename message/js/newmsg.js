  $(document).ready(function () {

      fetch_user();


      setInterval(function () {
          ckeckActive();
          fetch_user();
      }, 30000);

      function fetch_user() {
          $.ajax({
              url: "fetch_user.php",
              method: "post",
              success: function (data) {
                  $('#user_details').html(data);
              }

          });

      }

      function ckeckActive() {
          $.ajax({
              url: "online.php",
              success: function () {

              }
          });
      }

      $(document).on('click', '.start_chat', function (e) {

          var rid = $(this).data("touserid");
          $.ajax({
              url: "upd.php",
              method: "post",
              data: {
                  rid: rid
              },
              success: function (data) {

              }
          });
      });





  });





  var messageBody = document.querySelector('#messageBody');
  messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;

  $(document).ready(function () {

      var messageBody = document.querySelector('#messageBody');
      messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;








      $(document).on('click', '.send_chat', function () {

          var msg = $('#chat_msg_' + userid).val();
          if (msg != "") {
              $.ajax({
                  url: "insertmsg.php",
                  method: "post",
                  data: {
                      userid: userid,
                      msg: msg
                  },
                  success: function (data) {
                      $('.rmsg' + userid).scrollTop = $('.rmsg' + userid).scrollHeight;
                      $('#chat_msg_' + userid).val('');

                      $('.rmsg' + userid).html(data);
                      fetch_msg_history(userid);
                      var messageBody = document.querySelector('#messageBody');
                      messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
                  }
              });
          }

      });
  });

  setInterval(function () {
      fetch_msg_history(userid);
  }, 10000);


  fetch_msg_history(userid);

  function fetch_msg_history(userid) {
      $.ajax({
          url: "fetch_msg_history.php",
          method: "post",
          data: {
              userid: userid
          },
          success: function (data) {
              $('.rmsg' + userid).html(data);
              var messageBody = document.querySelector('#messageBody');
              messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;

          }

      });

  }


  // SEARCH START
  $(document).ready(function () {

      $('.search').keyup(function (e) {
          $('.ser').removeClass("d-none");
          $('.chat-head').css({
              "z-index": "0"
          });
          var Svalue = $(this).val();
          if (e.which === 32 && !$(this).val().len()) {
              e.preventDefault();
          }
          if (Svalue != '') {
              $.ajax({
                  url: "databases/search.php",
                  method: "post",
                  data: {
                      Svalue: Svalue
                  },
                  success: function (data) {
                      $('.search-result').html(data);


                  }
              });


          } else {
              $('.search-result').html('');
              $('.ser').addClass("d-none");
              $('.chat-head').css({
                  "z-index": "1"
              });
          }
      });
      $('.searchp').click(function () {
          $('.search').val('');
      });


      $('.fsearch').keyup(function (e) {

          var fvalue = $(this).val();
          if (e.which === 32 && !$(this).val().len()) {
              e.preventDefault();
          }
          if (fvalue != '') {
              $.ajax({
                  url: "searchfriend.php",
                  method: "post",
                  data: {
                      fvalue: fvalue
                  },
                  success: function (data) {
                      $('#user_details').html(data);


                  }
              });


          } else {
              //             $('.search-result').html('');
              //              $('.ser').addClass("d-none");
              //              $('.chat-head').css({"z-index":"1"});
              window.location.reload(true);
          }
      });
      $('.searchp').click(function () {
          $('.search').val('');
      });



      //DELETE POST

      $('.delete').on('click', function (e) {
          e.preventDefault();

          var postid = $(this).data('id');



          $('#single' + postid).html("are you sure");
          $('#single' + postid).hide();

      });


      //NOTIFICATION START
      var mainid = "<?php echo $_SESSION['uid'];  ?>";
      setInterval(function () {
          notification(mainid);
      }, 12000);
      notification(mainid);

      function notification(mainid) {
          var mainid = mainid;
          var post_id = $('.like-btn').data('id');

          $.ajax({
              url: "../databases/home/newnotification.php",
              method: "post",
              data: {
                  mainid: mainid,
                  postid: post_id
              },
              success: function (data) {

                  if (data == 0) {
                      $('.ncount').addClass("d-none");
                  } else {
                      $('.ncount').removeClass("d-none");
                  }

                  $('.no').html(data);


              }
          });







      }




  });

  //============MESSAGE NOTIFICATION=============

  setInterval(function () {
      msgnotification(mainid);
  }, 11000);
  msgnotification(mainid);

  function msgnotification(mainid) {
      var mainid = mainid;

      $.ajax({
          url: "../databases/home/msgnoti.php",
          method: "post",
          data: {
              mainid: mainid
          },
          success: function (data) {

              if (data != 0) {
                  $('.mcount').removeClass("d-none");
                  $('.mn').html(data);
              }
          }
      });


      $.ajax({
          url: "../databases/home/msgupdate.php",
          method: "post",
          data: {
              mainid: mainid
          },
          success: function (data) {}



      });






  }


  //FRIEND REQUEST START



  setInterval(function () {
      reqnotification();
  }, 15000);
  reqnotification();

  function reqnotification() {


      $.ajax({
          url: "../friend/dastabases/frndreqst/countreq.php",
          method: "post",
          data: "",
          success: function (data) {
              // alert(data);
              if (data != 0) {
                  $('.count').removeClass("d-none");
                  $('.rn').html(data);
              }
          }
      });

      $('.reqnoti').click(function () {
          $.ajax({
              url: "../friend/dastabases/frndreqst/updatereq.php",
              method: "post",
              data: "",
              success: function (data) {


              }



          });



      });


  }
