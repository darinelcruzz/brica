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

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "MedicalWebPage",
  "about": {
    "@type": "MedicalCondition",
    "name": [
      "High Blood Pressure",
      "hypertension"
    ]
  },
  "aspect": [
    "Diagnosis",
    "Treatment"
  ],
  "audience": "http://schema.org/Patient",
  "drug": [
    {
      "@type": "Drug",
      "nonProprietaryName": "propanaolol",
    },
    {
      "@type": "Drug",
      "nonProprietaryName": "atenolol",
    }
  ],
  "lastReviewed": "2011-09-14",
  "name": "beta-blocker",
  "specialty": "http://schema.org/Cardiovascular"
}
</script>

</body>
</html>
