// let modal = document.querySelector('#modal-window');
// let btn = document.querySelector('#open-modal');
// let closed = modal.getElementsByClassName('modal__close')[0];

// // When the user clicks the button, open the modal.
// btn.onclick = function() {
//   modal.style.display = 'block';
// };

// // When the user clicks on 'X', close the modal
// closed.onclick = function() {
//   modal.style.display = 'none';
// };

// // When the user clicks outside the modal -- close it.
// window.onclick = function(event) {
//   if (event.target == modal) {
//     // Which means he clicked somewhere in the modal (background area), but not target = modal-content
//     modal.style.display = 'none';
//   }
// };


// document.addEventListener('DOMContentLoaded', () => {
//   // モーダルを開くすべてのボタンにイベントリスナーを設定
//   document.querySelectorAll('.open-modal').forEach(button => {
//     button.addEventListener('click', function() {
//       let modalId = this.dataset.modalId;
//       let modal = document.getElementById(modalId);
//       modal.style.display = 'block';
//     });
//   });

//   // モーダルを閉じるすべての 'X' にイベントリスナーを設定
//   document.querySelectorAll('.modal__close').forEach(closeButton => {
//     closeButton.addEventListener('click', function() {
//       this.closest('.modal').style.display = 'none';
//     });
//   });

//   // モーダルの外側をクリックしたときにモーダルを閉じる
//   window.addEventListener('click', function(event) {
//     if (event.target.classList.contains('modal')) {
//       event.target.style.display = 'none';
//     }
//   });
// });

document.addEventListener('DOMContentLoaded', () => {
  // モーダルを開くすべてのボタンにイベントリスナーを設定
  document.querySelectorAll('.open-modal').forEach(button => {
    button.addEventListener('click', function() {
      let modalId = button.dataset.modalId;
      console.log(modalId);
      let modal = document.getElementById(modalId);
      console.log(modal);
      if (modal) {
        modal.style.display = 'block';
      }
    });
  });

  // モーダルを閉じるすべての 'X' にイベントリスナーを設定
  document.querySelectorAll('.modal__close').forEach(closeButton => {
    closeButton.addEventListener('click', function() {
      let modal = this.closest('.modal');
      if (modal) {
        modal.style.display = 'none';
      }
    });
  });

  // モーダルの外側をクリックしたときにモーダルを閉じる
  window.addEventListener('click', function(event) {
    if (event.target.classList.contains('modal')) {
      event.target.style.display = 'none';
    }
  });
});