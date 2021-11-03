{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Users list')

{{-- vendors styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

{{-- page content --}}
@section('content')
<!-- users list start -->
<section class="users-list-wrapper section">
  <div class="users-list-filter">
    <div class="card-panel">
      <div class="row">
        <form>
          <div class="col s12 m6 l3">
            <label for="users-list-verified">Verified</label>
            <div class="input-field">
              <select class="form-control" id="users-list-verified">
                <option value="">Any</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
          </div>
          <div class="col s12 m6 l3">
            <label for="users-list-role">Role</label>
            <div class="input-field">
              <select class="form-control" id="users-list-role">
                <option value="">Any</option>
                <option value="User">User</option>
                <option value="Staff">Staff</option>
              </select>
            </div>
          </div>
          <div class="col s12 m6 l3">
            <label for="users-list-status">Status</label>
            <div class="input-field">
              <select class="form-control" id="users-list-status">
                <option value="">Any</option>
                <option value="Active">Active</option>
                <option value="Close">Close</option>
                <option value="Banned">Banned</option>
              </select>
            </div>
          </div>
          <div class="col s12 m6 l3 display-flex align-items-center show-btn">
            <button type="submit" class="btn btn-block indigo waves-effect waves-light">Show</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <!-- datatable start -->
        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th></th>
                <th>id</th>
                <th>username</th>
                <th>name</th>
                <th>last activity</th>
                <th>verified</th>
                <th>role</th>
                <th>status</th>
                <th>edit</th>
                <th>view</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td>300</td>
                <td><a href="{{asset('page-users-view')}}">dean3004</a>
                </td>
                <td>Dean Stanley</td>
                <td>30/04/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>301</td>
                <td><a href="{{asset('page-users-view')}}">zena0604</a>
                </td>
                <td>Zena Buckley</td>
                <td>06/04/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>302</td>
                <td><a href="{{asset('page-users-view')}}">delilah0301</a>
                </td>
                <td>Delilah Moon</td>
                <td>03/01/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>303</td>
                <td><a href="{{asset('page-users-view')}}">hillary1807</a>
                </td>
                <td>Hillary Rasmussen</td>
                <td>18/07/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>304</td>
                <td><a href="{{asset('page-users-view')}}">herman2003</a>
                </td>
                <td>Herman Tate</td>
                <td>20/03/2020</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>305</td>
                <td><a href="{{asset('page-users-view')}}">kuame3008</a>
                </td>
                <td>Kuame Ford</td>
                <td>30/08/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>306</td>
                <td><a href="{{asset('page-users-view')}}">fulton2009</a>
                </td>
                <td>Fulton Stafford</td>
                <td>20/09/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>307</td>
                <td><a href="{{asset('page-users-view')}}">piper0508</a>
                </td>
                <td>Piper Jordan</td>
                <td>05/08/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>308</td>
                <td><a href="{{asset('page-users-view')}}">neil1002</a>
                </td>
                <td>Neil Sosa</td>
                <td>10/02/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>309</td>
                <td><a href="{{asset('page-users-view')}}">caldwell2402</a>
                </td>
                <td>Caldwell Chapman</td>
                <td>24/02/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>310</td>
                <td><a href="{{asset('page-users-view')}}">wesley0508</a>
                </td>
                <td>Wesley Oneil</td>
                <td>05/08/2020</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>311</td>
                <td><a href="{{asset('page-users-view')}}">tallulah2009</a>
                </td>
                <td>Tallulah Fleming</td>
                <td>20/09/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>312</td>
                <td><a href="{{asset('page-users-view')}}">iris2505</a>
                </td>
                <td>Iris Maddox</td>
                <td>25/05/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>313</td>
                <td><a href="{{asset('page-users-view')}}">caleb1504</a>
                </td>
                <td>Caleb Bradley</td>
                <td>15/04/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>314</td>
                <td><a href="{{asset('page-users-view')}}">illiana0410</a>
                </td>
                <td>Illiana Grimes</td>
                <td>04/10/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>315</td>
                <td><a href="{{asset('page-users-view')}}">chester0902</a>
                </td>
                <td>Chester Estes</td>
                <td>09/02/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>316</td>
                <td><a href="{{asset('page-users-view')}}">gregory2309</a>
                </td>
                <td>Gregory Hayden</td>
                <td>23/09/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>317</td>
                <td><a href="{{asset('page-users-view')}}">jescie1802</a>
                </td>
                <td>Jescie Parker</td>
                <td>18/02/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>318</td>
                <td><a href="{{asset('page-users-view')}}">sydney3101</a>
                </td>
                <td>Sydney Cabrera</td>
                <td>31/01/2020</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>319</td>
                <td><a href="{{asset('page-users-view')}}">gray2702</a>
                </td>
                <td>Gray Valenzuela</td>
                <td>27/02/2020</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip orange lighten-5"><span class="orange-text">Close</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>320</td>
                <td><a href="{{asset('page-users-view')}}">hoyt0305</a>
                </td>
                <td>Hoyt Ellison</td>
                <td>03/05/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>321</td>
                <td><a href="{{asset('page-users-view')}}">damon0209</a>
                </td>
                <td>Damon Berry</td>
                <td>02/09/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>322</td>
                <td><a href="{{asset('page-users-view')}}">kelsie0511</a>
                </td>
                <td>Kelsie Dunlap</td>
                <td>05/11/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip orange lighten-5"><span class="orange-text">Close</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>323</td>
                <td><a href="{{asset('page-users-view')}}">abel1606</a>
                </td>
                <td>Abel Dunn</td>
                <td>16/06/2020</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>324</td>
                <td><a href="{{asset('page-users-view')}}">nina2208</a>
                </td>
                <td>Nina Byers</td>
                <td>22/08/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip orange lighten-5"><span class="orange-text">Close</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>325</td>
                <td><a href="{{asset('page-users-view')}}">erasmus1809</a>
                </td>
                <td>Erasmus Walter</td>
                <td>18/09/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>326</td>
                <td><a href="{{asset('page-users-view')}}">yael2612</a>
                </td>
                <td>Yael Marshall</td>
                <td>26/12/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip orange lighten-5"><span class="orange-text">Close</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>327</td>
                <td><a href="{{asset('page-users-view')}}">thomas2012</a>
                </td>
                <td>Thomas Dudley</td>
                <td>20/12/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>328</td>
                <td><a href="{{asset('page-users-view')}}">althea2810</a>
                </td>
                <td>Althea Turner</td>
                <td>28/10/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>329</td>
                <td><a href="{{asset('page-users-view')}}">jena2206</a>
                </td>
                <td>Jena Schroeder</td>
                <td>22/06/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>330</td>
                <td><a href="{{asset('page-users-view')}}">hyacinth2201</a>
                </td>
                <td>Hyacinth Maxwell</td>
                <td>22/01/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>331</td>
                <td><a href="{{asset('page-users-view')}}">madeson1907</a>
                </td>
                <td>Madeson Byers</td>
                <td>19/07/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>332</td>
                <td><a href="{{asset('page-users-view')}}">elmo0707</a>
                </td>
                <td>Elmo Tran</td>
                <td>07/07/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>333</td>
                <td><a href="{{asset('page-users-view')}}">shelley0309</a>
                </td>
                <td>Shelley Eaton</td>
                <td>03/09/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>334</td>
                <td><a href="{{asset('page-users-view')}}">graham0301</a>
                </td>
                <td>Graham Flores</td>
                <td>03/01/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>335</td>
                <td><a href="{{asset('page-users-view')}}">erasmus2110</a>
                </td>
                <td>Erasmus Mclaughlin</td>
                <td>21/10/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>
<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/page-registry.js')}}"></script>
@endsection
