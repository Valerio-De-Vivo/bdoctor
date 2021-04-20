@extends('layouts.dashboard')

@section('content')
  <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4 py-4" style="margin-top: 120px;">
      <h1>IN QUESTA PAGINA CI SONO LE INFORMAZIONI</h1>
      <form class="col-md-8">
          <div class="mb-3">
              <label for="name" class="form-label">Nome*</label>
              <input type="text" class="form-control" id="name" value="Nome">
          </div>
          <div class="mb-3">
              <label for="surname" class="form-label">Cognome*</label>
              <input type="text" class="form-control" id="surname" value="Cognome">
          </div>
          <div class="mb-3">
              <label for="address" class="form-label">Indirizzo*</label>
              <input type="text" class="form-control" id="address" value="Via ciao, 10">
          </div>
          <div class="mb-3">
              <label for="city" class="form-label">Città*</label>
              <input type="text" class="form-control" id="city" value="Milano">
          </div>
          <div class="mb-3">
              <label class="form-label d-block">Specializzazione*:</label>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" checked type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Urologo</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">Dentista</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Urologo</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">Dentista</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Urologo</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">Dentista</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Urologo</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">Dentista</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Urologo</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">Dentista</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Urologo</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">Dentista</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Urologo</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">Dentista</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Urologo</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">Dentista</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Urologo</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">Dentista</label>
              </div>
          </div>


          <div class="mb-3">
              <label for="phone" class="form-label">Telefono</label>
              <input type="text" class="form-control" id="phone" value="366 1254856">
          </div>

          <div class="mb-3">
              <label class="form-label d-block">Prestazione:</label>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" checked type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">In sede</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">Da remoto</label>
              </div>
          </div>
          <div id="emailHelp" class="form-text mb-3">*: campo obbligatorio</div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </main>
@endsection
