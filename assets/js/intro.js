document.addEventListener("DOMContentLoaded", () => {

  const intro = document.querySelector("#nienke-intro");
  const typewriter = document.querySelector("#nienke-typewriter");

  if (!intro || !typewriter) return;


  /* ========================================
     TEXT
     ======================================== */

  const text = "NvZ";

  let index = 0;


  /* ========================================
     TYPEWRITER
     ======================================== */

  function typeNextCharacter() {

    if (index >= text.length) {
      finishIntro();
      return;
    }

    typewriter.textContent += text[index];

    const character = text[index];

    index++;


    /*
     * Slightly imperfect timing makes
     * the typing feel more tactile.
     */

    let delay = 105;

    if (character === " ") {
      delay = 180;
    } else {
      delay += Math.floor(Math.random() * 55);
    }

    setTimeout(typeNextCharacter, delay);
  }


  /* ========================================
     FINISH
     ======================================== */

  function finishIntro() {

    /*
     * Let the completed name breathe.
     */

    setTimeout(() => {

      intro.classList.add("is-leaving");


      /*
       * Remove the intro after
       * the fade has completed.
       */

      setTimeout(() => {
        intro.classList.add("is-hidden");
      }, 500);

    }, 500);
  }


  /* ========================================
     START
     ======================================== */

  setTimeout(typeNextCharacter, 450);

});