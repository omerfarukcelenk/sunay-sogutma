<?php
declare(strict_types=1);

$siteName = 'Sunay Soğutma';
$siteUrl = 'https://www.sunaysogutma.com/';
$phoneDisplay = '+90 533 371 66 14';
$phoneTel = '+905333716614';
$email = 'info@sunaysogutma.com';
$whatsappUrl = 'https://wa.me/905333716614?text=' . rawurlencode('Merhaba, Sunay Soğutma hizmetleri hakkında bilgi almak istiyorum.');
$city = 'Mersin';
$district = 'Yenişehir';
$streetAddress = 'Palmiye Mah. 1223 Sk. Milas Apt. No: 4/A';
$fullAddress = $streetAddress . ' ' . $district . '/' . $city;
$mapsQuery = rawurlencode('Palmiye Mahallesi 1223 Sokak Milas Apartmanı No:4 Yenişehir Mersin');
$mapsEmbedUrl = 'https://maps.google.com/maps?q=' . $mapsQuery . '&z=16&ie=UTF8&output=embed';
$mapsLinkUrl = 'https://www.google.com/maps/search/?api=1&query=' . $mapsQuery;
$pageTitle = 'Sunay Soğutma | Mersin Klima & Kombi Bakım, Onarım, Satış ve Temizlik';
$pageDescription = 'Sunay Soğutma — Mersin\'de klima ve kombi bakım, onarım, satış ve temizlik hizmetleri. Hızlı servis, uzman ekip. Hemen arayın: +90 533 371 66 14';
$ogImage = $siteUrl . 'assets/img/hero.jpg';

$klimaServices = [
    ['slug' => 'klima-bakim', 'title' => 'Klima Bakım', 'desc' => 'Periyodik bakım ile verimli soğutma, düşük enerji tüketimi ve uzun ömür.', 'img' => 'service-klima-bakim.jpg'],
    ['slug' => 'klima-onarim', 'title' => 'Klima Onarım', 'desc' => 'Arıza tespiti ve yerinde onarım. Tüm marka ve modellerde hızlı müdahale.', 'img' => 'service-klima-onarim.jpg'],
    ['slug' => 'klima-satis', 'title' => 'Klima Satış', 'desc' => 'İhtiyacınıza uygun klima seçimi, satış ve profesyonel montaj.', 'img' => 'service-klima-satis.jpg'],
    ['slug' => 'klima-temizlik', 'title' => 'Klima Temizlik', 'desc' => 'Derin temizlik ve dezenfeksiyon ile temiz hava ve sağlıklı ortam.', 'img' => 'service-klima-temizlik.jpg'],
];

$kombiServices = [
    ['slug' => 'kombi-bakim', 'title' => 'Kombi Bakım', 'desc' => 'Sezonluk bakım ile güvenli ısınma, verimlilik ve arıza önleme.', 'img' => 'service-kombi-bakim.jpg'],
    ['slug' => 'kombi-onarim', 'title' => 'Kombi Onarım', 'desc' => 'Su kaçakları, basınç ve ısıtma sorunlarında uzman kombi onarımı.', 'img' => 'service-kombi-onarim.jpg'],
    ['slug' => 'kombi-satis', 'title' => 'Kombi Satış', 'desc' => 'Doğru kapasitede kombi satışı, kurulum ve ilk çalıştırma.', 'img' => 'service-kombi-satis.jpg'],
    ['slug' => 'kombi-temizlik', 'title' => 'Kombi Temizlik', 'desc' => 'Eşanjör ve tesisat temizliği ile sessiz, verimli kombi performansı.', 'img' => 'service-kombi-temizlik.jpg'],
];

$gallery = [
    ['img' => 'gallery-1.jpg', 'alt' => 'Klima montajı — teraziyle hassas duvar montajı'],
    ['img' => 'gallery-2.jpg', 'alt' => 'Dış ünite montajı — Mersin apartman cephesi'],
    ['img' => 'gallery-3.jpg', 'alt' => 'Klima gaz dolumu ve basınç kontrolü'],
    ['img' => 'gallery-4.jpg', 'alt' => 'Kombi montajı — temiz tesisat işçiliği'],
    ['img' => 'gallery-5.jpg', 'alt' => 'Petek ve radyatör bakım servisi'],
    ['img' => 'gallery-6.jpg', 'alt' => 'Klima derin temizlik — yıkama körüğü ile'],
];

$jsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'HVACBusiness',
    'name' => $siteName,
    'url' => $siteUrl,
    'telephone' => $phoneTel,
    'email' => $email,
    'image' => $ogImage,
    'description' => $pageDescription,
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => $streetAddress,
        'addressLocality' => $district,
        'addressRegion' => $city,
        'addressCountry' => 'TR',
    ],
    'hasMap' => $mapsLinkUrl,
    'areaServed' => [
        '@type' => 'City',
        'name' => $city,
    ],
    'priceRange' => '₺₺',
    'openingHoursSpecification' => [
        '@type' => 'OpeningHoursSpecification',
        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        'opens' => '09:00',
        'closes' => '19:00',
    ],
    'sameAs' => [$whatsappUrl],
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Klima ve Kombi Hizmetleri',
        'itemListElement' => array_map(static function (array $s): array {
            return [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => $s['title'],
                    'description' => $s['desc'],
                ],
            ];
        }, array_merge($klimaServices, $kombiServices)),
    ],
];
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="robots" content="index, follow, max-image-preview:large">
  <meta name="author" content="Sunay Soğutma">
  <meta name="geo.region" content="TR-33">
  <meta name="geo.placename" content="Mersin">
  <link rel="canonical" href="<?= htmlspecialchars($siteUrl, ENT_QUOTES, 'UTF-8') ?>">

  <meta property="og:type" content="website">
  <meta property="og:locale" content="tr_TR">
  <meta property="og:site_name" content="<?= htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:url" content="<?= htmlspecialchars($siteUrl, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:image" content="<?= htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8') ?>">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8') ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
  <link rel="preload" as="image" href="./assets/img/hero.jpg" fetchpriority="high">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='14' fill='%230b1f33'/%3E%3Cpath d='M18 34c6-10 22-10 28 0' stroke='%2356c4e8' stroke-width='4' fill='none' stroke-linecap='round'/%3E%3Ccircle cx='32' cy='26' r='5' fill='%2356c4e8'/%3E%3C/svg%3E">

  <script type="application/ld+json"><?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
</head>
<body>
  <a class="skip-link" href="#ana-icerik">İçeriğe geç</a>

  <header class="site-header" id="ust">
    <div class="container header-inner">
      <a class="brand" href="#ust" aria-label="Sunay Soğutma ana sayfa">
        <span class="brand-mark" aria-hidden="true"></span>
        <span class="brand-text">Sunay <em>Soğutma</em></span>
      </a>
      <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" aria-label="Menüyü aç">
        <span></span><span></span>
      </button>
      <nav class="site-nav" id="site-nav" aria-label="Ana menü">
        <a href="#hizmetler">Hizmetler</a>
        <a href="#neden">Neden Biz</a>
        <a href="#galeri">Galeri</a>
        <a href="#iletisim">İletişim</a>
        <a class="btn btn-whatsapp btn-sm" href="<?= htmlspecialchars($whatsappUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer">WhatsApp</a>
      </nav>
    </div>
  </header>

  <main id="ana-icerik">
    <section class="hero" aria-labelledby="hero-brand">
      <div class="hero-media">
        <img
          src="./assets/img/hero.jpg"
          alt="Profesyonel klima ve soğutma servisi"
          width="1536"
          height="1024"
          fetchpriority="high"
          decoding="async"
        >
        <div class="hero-veil" aria-hidden="true"></div>
      </div>
      <div class="container hero-content">
        <p class="hero-brand" id="hero-brand">Sunay Soğutma</p>
        <h1>Klima ve kombi için güvenilir servis</h1>
        <p class="hero-lead">Bakım, onarım, satış ve temizlik — aynı gün müdahale, uzman ekip.</p>
        <div class="hero-actions">
          <a class="btn btn-primary" href="tel:<?= htmlspecialchars($phoneTel, ENT_QUOTES, 'UTF-8') ?>">Hemen Ara</a>
          <a class="btn btn-ghost" href="<?= htmlspecialchars($whatsappUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer">WhatsApp Yaz</a>
        </div>
      </div>
    </section>

    <section class="section services" id="hizmetler" aria-labelledby="hizmetler-title">
      <div class="container">
        <header class="section-head reveal">
          <h2 id="hizmetler-title">Hizmetlerimiz</h2>
          <p>Klima ve kombide uçtan uca çözüm: bakım, onarım, satış ve temizlik.</p>
        </header>

        <div class="service-block reveal">
          <h3 class="service-group-title">Klima</h3>
          <div class="service-grid">
            <?php foreach ($klimaServices as $service): ?>
              <article class="service-item" id="<?= htmlspecialchars($service['slug'], ENT_QUOTES, 'UTF-8') ?>">
                <div class="service-visual">
                  <img
                    src="./assets/img/<?= htmlspecialchars($service['img'], ENT_QUOTES, 'UTF-8') ?>"
                    alt="<?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?>"
                    width="1200"
                    height="800"
                    loading="lazy"
                    decoding="async"
                  >
                </div>
                <h4><?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?></h4>
                <p><?= htmlspecialchars($service['desc'], ENT_QUOTES, 'UTF-8') ?></p>
              </article>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="service-block reveal">
          <h3 class="service-group-title">Kombi</h3>
          <div class="service-grid">
            <?php foreach ($kombiServices as $service): ?>
              <article class="service-item" id="<?= htmlspecialchars($service['slug'], ENT_QUOTES, 'UTF-8') ?>">
                <div class="service-visual">
                  <img
                    src="./assets/img/<?= htmlspecialchars($service['img'], ENT_QUOTES, 'UTF-8') ?>"
                    alt="<?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?>"
                    width="1200"
                    height="800"
                    loading="lazy"
                    decoding="async"
                  >
                </div>
                <h4><?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?></h4>
                <p><?= htmlspecialchars($service['desc'], ENT_QUOTES, 'UTF-8') ?></p>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="section why" id="neden" aria-labelledby="neden-title">
      <div class="container why-inner reveal">
        <header class="section-head">
          <h2 id="neden-title">Neden Sunay Soğutma?</h2>
          <p>Net işçilik, şeffaf süreç ve hızlı dönüş — konforunuz kesintisiz kalsın.</p>
        </header>
        <ul class="why-list">
          <li>
            <strong>Uzman teknik ekip</strong>
            <span>Klima ve kombi sistemlerinde deneyimli servis.</span>
          </li>
          <li>
            <strong>Hızlı müdahale</strong>
            <span>Arıza ve bakım taleplerinde öncelikli planlama.</span>
          </li>
          <li>
            <strong>Uçtan uca hizmet</strong>
            <span>Satıştan montaja, temizlikten periyodik bakıma tek adres.</span>
          </li>
        </ul>
      </div>
    </section>

    <section class="section gallery" id="galeri" aria-labelledby="galeri-title">
      <div class="container">
        <header class="section-head reveal">
          <h2 id="galeri-title">Galeri</h2>
          <p>Saha çalışmalarımızdan seçilmiş kareler.</p>
        </header>
        <div class="gallery-grid reveal">
          <?php foreach ($gallery as $i => $item): ?>
            <button
              type="button"
              class="gallery-item"
              data-gallery-index="<?= (int) $i ?>"
              aria-label="<?= htmlspecialchars($item['alt'], ENT_QUOTES, 'UTF-8') ?> — büyüt"
            >
              <img
                src="./assets/img/<?= htmlspecialchars($item['img'], ENT_QUOTES, 'UTF-8') ?>"
                alt="<?= htmlspecialchars($item['alt'], ENT_QUOTES, 'UTF-8') ?>"
                width="900"
                height="900"
                loading="lazy"
                decoding="async"
                fetchpriority="low"
              >
            </button>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section contact" id="iletisim" aria-labelledby="iletisim-title">
      <div class="container contact-grid">
        <div class="contact-copy reveal">
          <header class="section-head">
            <h2 id="iletisim-title">İletişim</h2>
            <p>Teknik destek, keşif veya randevu için bize ulaşın.</p>
          </header>
          <ul class="contact-list">
            <li>
              <span class="contact-label">Telefon</span>
              <a href="tel:<?= htmlspecialchars($phoneTel, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($phoneDisplay, ENT_QUOTES, 'UTF-8') ?></a>
            </li>
            <li>
              <span class="contact-label">E-posta</span>
              <a href="mailto:<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></a>
            </li>
            <li>
              <span class="contact-label">WhatsApp</span>
              <a href="<?= htmlspecialchars($whatsappUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer">Mesaj gönder</a>
            </li>
            <li>
              <span class="contact-label">Adres</span>
              <a href="<?= htmlspecialchars($mapsLinkUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer"><?= htmlspecialchars($fullAddress, ENT_QUOTES, 'UTF-8') ?></a>
            </li>
          </ul>
          <div class="contact-actions">
            <a class="btn btn-primary" href="tel:<?= htmlspecialchars($phoneTel, ENT_QUOTES, 'UTF-8') ?>">Ara</a>
            <a class="btn btn-whatsapp" href="<?= htmlspecialchars($whatsappUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer">WhatsApp</a>
          </div>
        </div>
        <div class="contact-map reveal">
          <iframe
            title="Sunay Soğutma — <?= htmlspecialchars($fullAddress, ENT_QUOTES, 'UTF-8') ?> konum haritası"
            src="<?= htmlspecialchars($mapsEmbedUrl, ENT_QUOTES, 'UTF-8') ?>"
            width="600"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container footer-inner">
      <a class="brand brand-footer" href="#ust">
        <span class="brand-mark" aria-hidden="true"></span>
        <span class="brand-text">Sunay <em>Soğutma</em></span>
      </a>
      <nav class="footer-nav" aria-label="Alt menü">
        <a href="#hizmetler">Hizmetler</a>
        <a href="#galeri">Galeri</a>
        <a href="#iletisim">İletişim</a>
      </nav>
      <p class="footer-meta"><?= htmlspecialchars($fullAddress, ENT_QUOTES, 'UTF-8') ?></p>
      <p class="footer-meta">&copy; <?= date('Y') ?> Sunay Soğutma. Tüm hakları saklıdır.</p>
    </div>
  </footer>

  <a
    class="wa-fab"
    href="<?= htmlspecialchars($whatsappUrl, ENT_QUOTES, 'UTF-8') ?>"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="WhatsApp ile yazın"
  >
    <svg viewBox="0 0 24 24" width="28" height="28" aria-hidden="true" focusable="false">
      <path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
    </svg>
  </a>

  <div class="lightbox" id="lightbox" hidden>
    <button type="button" class="lightbox-close" aria-label="Kapat">&times;</button>
    <button type="button" class="lightbox-prev" aria-label="Önceki">‹</button>
    <img src="" alt="" class="lightbox-image">
    <button type="button" class="lightbox-next" aria-label="Sonraki">›</button>
  </div>

  <script>
    window.SUNAY_GALLERY = <?= json_encode(array_map(static function (array $item): array {
        return ['src' => './assets/img/' . $item['img'], 'alt' => $item['alt']];
    }, $gallery), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
  </script>
  <script src="./assets/js/main.js" defer></script>
</body>
</html>
