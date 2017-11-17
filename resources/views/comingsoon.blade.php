<!DOCTYPE html>
<html lang="en">
@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader', ['headerTitle' => 'Grupo Brica'])
@show

<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    Proximamente web Grupo Brica <br>
    <a href="/intranet" class="btn btn-default">
        Ir a la Intranet &nbsp;
        <i class="fa fa-forward" aria-hidden="true"></i>
    </a>
  </div>

</div>

<div itemscope itemtype="http://schema.org/MedicalWebPage">
  <link itemprop="audience" href="http://schema.org/Patient" />
  <link itemprop="specialty" href="http://schema.org/Cardiovascular" />
  <meta itemprop="lastReviewed" content="2017-09-14"/>
  <h1>Acerca
    <span itemprop="about" itemscope itemtype="http://schema.org/MedicalCondition">
      <span itemprop="name">Presión alta</span>
      (<span itemprop="name">Hipertensión</span>)</span>
  </h1>
  ...
  <h2><span itemprop="aspect">Diagnosis</span></h2>
  High blood pressure is diagnosed by measuring ...
  ...
  <h2><span itemprop="aspect">Treatment</span></h2>
  There are many common treatments for high blood pressure,
  including
  <span itemscope itemtype="http://schema.org/DrugClass">
    <span itemprop="name">beta-blocker</span> drugs such as
    <span itemprop="drug" itemscope itemtype="http://schema.org/Drug">
      <span itemprop="nonProprietaryName">propanaolol</span>
      (<span itemprop="otherName">Innopran</span>)
    </span>
  and
    <span itemprop="drug" itemscope itemtype="http://schema.org/Drug">
      <span itemprop="nonProprietaryName">atenolol</span>
      (<span itemprop="otherName">Tenormin</span>)
    </span>
</div>
</body>
</html>
