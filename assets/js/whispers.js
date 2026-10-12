/* ==========================================================
   PROJECT WHITE RABBIT
   01 — THE WHISPERS
   ========================================================== */

(() => {
  "use strict";

  // Only run on the homepage.
  const homepage = document.querySelector(".nienke-home");

  if (!homepage) return;

  // Respect visitors who prefer reduced motion.
  const reducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)"
  );

  if (reducedMotion.matches) return;

  // Our mysterious messages.
  const messages = [
    "LOOK CLOSER",
    "DID YOU SEE THAT?",
    "FOLLOW THE RABBIT",
    "NOTHING IS RANDOM",
    "STAY CURIOUS",
    "DIG DEEPER",
    "THERE IS MORE",
    "ARE YOU DREAMING?",
    "LOOK AGAIN",
    "YOU FOUND ME",
    "NOT EVERYTHING IS VISIBLE",
    "CURIOUSER AND CURIOUSER",
    "THE RABBIT KNOWS",
    "WHY NOT?"
  ];

  // Create our transparent animation layer.
  const layer = document.createElement("div");

  layer.className = "white-rabbit-layer";
  layer.setAttribute("aria-hidden", "true");

  document.body.appendChild(layer);

  let previousMessage = -1;
  let timer = null;
  let activeWhisper = null;
  let running = true;

  // Generate a random number.
  function random(min, max) {
    return Math.random() * (max - min) + min;
  }

  // Select a message without immediately repeating it.
  function chooseMessage() {
    let index;

    do {
      index = Math.floor(Math.random() * messages.length);
    } while (index === previousMessage);

    previousMessage = index;

    return messages[index];
  }

  // Create a mysterious whisper.
  function showWhisper() {
    if (!running || document.hidden) return;

    const whisper = document.createElement("span");

    whisper.className = "white-rabbit-whisper";
    whisper.textContent = chooseMessage();

    // Random position, away from screen edges.
    const x = random(20, 80);
    const y = random(20, 80);

    whisper.style.left = `${x}%`;
    whisper.style.top = `${y}%`;

    layer.appendChild(whisper);
    activeWhisper = whisper;

    // Trigger appearance.
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        whisper.classList.add("is-visible");
      });
    });

    // Keep the message visible briefly.
    const visibleDuration = random(200, 200);

    setTimeout(() => {
      whisper.classList.remove("is-visible");
      whisper.classList.add("is-disappearing");

      setTimeout(() => {
        whisper.remove();

        if (activeWhisper === whisper) {
          activeWhisper = null;
        }
      }, 700);
    }, visibleDuration);

    scheduleNext();
  }

  // Random pauses create anticipation.
  function scheduleNext() {
    clearTimeout(timer);

    const delay = random(5000, 12000);

    timer = setTimeout(showWhisper, delay);
  }

  // Pause when the visitor switches tabs.
  document.addEventListener("visibilitychange", () => {
    clearTimeout(timer);

    if (document.hidden) {
      activeWhisper?.remove();
      activeWhisper = null;
    } else if (running) {
      scheduleNext();
    }
  });

  // Allow the experiment to be stopped.
  window.stopWhiteRabbit = () => {
    running = false;
    clearTimeout(timer);
    activeWhisper?.remove();
    layer.remove();
  };

  // Begin after the homepage has settled.
  timer = setTimeout(showWhisper, 4000);
})();