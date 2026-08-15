(() => {
  const header = document.querySelector(".site-header");
  const toggle = document.querySelector(".nav-toggle");
  const nav = document.querySelector("#site-nav");
  const lightbox = document.querySelector("#lightbox");
  const lightboxImage = lightbox?.querySelector(".lightbox-image");
  const galleryItems = [...document.querySelectorAll("[data-gallery-index]")];
  const galleryData = Array.isArray(window.SUNAY_GALLERY) ? window.SUNAY_GALLERY : [];
  let galleryIndex = 0;

  const closeNav = () => {
    if (!nav || !toggle) return;
    nav.classList.remove("is-open");
    toggle.setAttribute("aria-expanded", "false");
    toggle.setAttribute("aria-label", "Menüyü aç");
  };

  if (toggle && nav) {
    toggle.addEventListener("click", () => {
      const open = toggle.getAttribute("aria-expanded") === "true";
      toggle.setAttribute("aria-expanded", String(!open));
      toggle.setAttribute("aria-label", open ? "Menüyü aç" : "Menüyü kapat");
      nav.classList.toggle("is-open", !open);
    });

    nav.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", closeNav);
    });
  }

  const onScroll = () => {
    if (!header) return;
    header.style.boxShadow =
      window.scrollY > 12 ? "0 10px 30px rgba(2, 12, 24, 0.35)" : "none";
  };

  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  const revealNodes = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        for (const entry of entries) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          }
        }
      },
      { threshold: 0.14, rootMargin: "0px 0px -40px 0px" }
    );
    revealNodes.forEach((node) => observer.observe(node));
  } else {
    revealNodes.forEach((node) => node.classList.add("is-visible"));
  }

  const openLightbox = (index) => {
    if (!lightbox || !lightboxImage || !galleryData.length) return;
    galleryIndex = (index + galleryData.length) % galleryData.length;
    const item = galleryData[galleryIndex];
    lightboxImage.src = item.src;
    lightboxImage.alt = item.alt || "";
    lightbox.hidden = false;
    document.body.style.overflow = "hidden";
  };

  const closeLightbox = () => {
    if (!lightbox || !lightboxImage) return;
    lightbox.hidden = true;
    lightboxImage.removeAttribute("src");
    document.body.style.overflow = "";
  };

  galleryItems.forEach((button) => {
    button.addEventListener("click", () => {
      const index = Number(button.getAttribute("data-gallery-index") || 0);
      openLightbox(index);
    });
  });

  lightbox?.querySelector(".lightbox-close")?.addEventListener("click", closeLightbox);
  lightbox?.querySelector(".lightbox-prev")?.addEventListener("click", () => {
    openLightbox(galleryIndex - 1);
  });
  lightbox?.querySelector(".lightbox-next")?.addEventListener("click", () => {
    openLightbox(galleryIndex + 1);
  });

  lightbox?.addEventListener("click", (event) => {
    if (event.target === lightbox) closeLightbox();
  });

  document.addEventListener("keydown", (event) => {
    if (lightbox?.hidden) return;
    if (event.key === "Escape") closeLightbox();
    if (event.key === "ArrowLeft") openLightbox(galleryIndex - 1);
    if (event.key === "ArrowRight") openLightbox(galleryIndex + 1);
  });
})();
