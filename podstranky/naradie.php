<?php
$basePath = '../';
$isSubpage = true;
include __DIR__ . '/../header.php';
?>

<div class="main-banner subpage-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="section-heading text-center">
          <h4>Servisne <em>naradie</em></h4>
          <img src="<?php echo $basePath; ?>assets/images/heading-line-dec.png" alt="">
          <p>Pracujeme s profesionalnym naradim, aby bola oprava presna, bezpecna a trvacna.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Mikroskopicke pracovisko</h4>
          <p>Na jemne opravy dosiek a kontrolu detailov pouzivame presne opticke vybavenie.</p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Servisne stanice</h4>
          <p>Teplotne riadene stanice minimalizuju riziko poskodenia komponentov.</p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Diagnosticke nastroje</h4>
          <p>Softverove a hardverove testovanie pred aj po oprave.</p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Antistaticke prostredie</h4>
          <p>Citlive suciastky opravujeme v bezpecnom ESD prostredi.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
