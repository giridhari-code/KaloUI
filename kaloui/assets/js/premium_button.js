// using GSAP
import { gsap } from "gsap";

document.querySelectorAll("[data-role='kalo-button']").forEach(btn => {
  btn.addEventListener("mouseenter", () => {
    gsap.to(btn, { scale: 1.05, duration: 0.3 });
  });
  btn.addEventListener("mouseleave", () => {
    gsap.to(btn, { scale: 1, duration: 0.3 });
  });
});


document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll("[data-role='kalo-button']");

  buttons.forEach(btn => {
    btn.addEventListener("click", () => {
      btn.classList.add("scale-95");
      setTimeout(() => btn.classList.remove("scale-95"), 150);
    });
  });
});
