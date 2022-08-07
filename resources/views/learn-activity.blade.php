<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel</title>

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

</head>

<body class="container p-3">
  <div class="row">
    <div class="card">
      <div class="card-header">
        <div class="h2">Learn Activity</div>
        <div class="">
          <Button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_activity_modal">Create</Button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="learn_activities_table">
            <thead>
              <th class="min-vw-125px">Metode</th>
              <th class="min-vw-125px">Januari</th>
              <th class="min-vw-125px">Februari</th>
              <th class="min-vw-125px">Maret</th>
              <th class="min-vw-125px">April</th>
              <th class="min-vw-125px">Mei</th>
              <th class="min-vw-125px">Juni</th>
            </thead>
            <tbody id="tbody">
              {{-- @foreach ($learnActivities as $learnActivity)
                <tr>
                  <td class="fw-bold">{{ $learnActivity['method_name'] }}</td>
                  <td>
                    <ul class="list-group list-group-flush">
                      @foreach ($learnActivity['january'] as $january)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="">{{ $january->name }}</div>
                            <div class="fs-6 fst-italic">({{ $january->start_date . '-' . $january->end_date }})</div>
                          </div>
                          <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                              data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                                  data-bs-target="#edit_activity_modal" activity_id="{{ $january->id }}"
                                  id="edit_activity_btn">Edit</a></li>
                              <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                                  data-bs-target="#delete_activity_modal" activity_id="{{ $january->id }}"
                                  id="delete_activity_btn">Delete</a>
                              </li>
                            </ul>
                          </div>
                      @endforeach
                    </ul>
                  </td>
                  <td>
                    <ul class="list-group list-group-flush">
                      @foreach ($learnActivity['february'] as $february)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="">{{ $february->name }}</div>
                            <div class="fs-6 fst-italic">({{ $february->start_date . '-' . $february->end_date }})</div>
                          </div>
                          <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                              data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                                  data-bs-target="#edit_activity_modal" activity_id="{{ $february->id }}"
                                  id="edit_activity_btn">Edit</a></li>
                              <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                                  data-bs-target="#delete_activity_modal" activity_id="{{ $february->id }}"
                                  id="delete_activity_btn">Delete</a>
                              </li>
                            </ul>
                          </div>
                      @endforeach
                    </ul>
                  </td>
                  <td>
                    <ul class="list-group list-group-flush">
                      @foreach ($learnActivity['march'] as $march)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="">{{ $march->name }}</div>
                            <div class="fs-6 fst-italic">({{ $march->start_date . '-' . $march->end_date }})</div>
                          </div>
                          <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                              data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                                  data-bs-target="#edit_activity_modal" activity_id="{{ $march->id }}"
                                  id="edit_activity_btn">Edit</a></li>
                              <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                                  data-bs-target="#delete_activity_modal" activity_id="{{ $march->id }}"
                                  id="delete_activity_btn">Delete</a>
                              </li>
                            </ul>
                          </div>
                      @endforeach
                    </ul>
                  </td>
                  <td>
                    <ul class="list-group list-group-flush">
                      @foreach ($learnActivity['april'] as $april)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="">{{ $april->name }}</div>
                            <div class="fs-6 fst-italic">({{ $april->start_date . '-' . $april->end_date }})</div>
                          </div>
                          <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                              data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                                  data-bs-target="#edit_activity_modal" activity_id="{{ $april->id }}"
                                  id="edit_activity_btn">Edit</a></li>
                              <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                                  data-bs-target="#delete_activity_modal" activity_id="{{ $april->id }}"
                                  id="delete_activity_btn">Delete</a>
                              </li>
                            </ul>
                          </div>
                      @endforeach
                    </ul>
                  </td>
                  <td>
                    <ul class="list-group list-group-flush">
                      @foreach ($learnActivity['may'] as $may)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="">{{ $may->name }}</div>
                            <div class="fs-6 fst-italic">({{ $may->start_date . '-' . $may->end_date }})</div>
                          </div>
                          <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                              data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                                  data-bs-target="#edit_activity_modal" activity_id="{{ $may->id }}"
                                  id="edit_activity_btn">Edit</a></li>
                              <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                                  data-bs-target="#delete_activity_modal" activity_id="{{ $may->id }}"
                                  id="delete_activity_btn">Delete</a>
                              </li>
                            </ul>
                          </div>
                      @endforeach
                    </ul>
                  </td>
                  <td>
                    <ul class="list-group list-group-flush">
                      @foreach ($learnActivity['june'] as $june)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="">{{ $june->name }}</div>
                            <div class="fs- fst-italic">({{ $june->start_date . '-' . $june->end_date }})</div>
                          </div>
                          <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                              data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                                  data-bs-target="#edit_activity_modal" activity_id="{{ $june->id }}"
                                  id="edit_activity_btn">Edit</a></li>
                              <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                                  data-bs-target="#delete_activity_modal" activity_id="{{ $june->id }}"
                                  id="delete_activity_btn">Delete</a>
                              </li>
                            </ul>
                          </div>
                      @endforeach
                    </ul>
                  </td>
                </tr>
              @endforeach --}}
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

  {{-- Modal Add --}}
  <div class="modal fade" tabindex="-1" id="add_activity_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New Activity</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="add_activity_form" action="{{ route('learn-activity.store') }}">
            <div class="mb-3">
              <label for="activity_name" class="form-label">Activity Name</label>
              <input class="form-control" id="activity_name" name="name">
            </div>
            <div class="mb-3">
              <label for="activity_name" class="form-label">Method</label>
              <select name="method_id" id="activity_method" class="form-select">
                <option>Select Method</option>
                @foreach ($methods as $method)
                  <option value="{{ $method->id }}">{{ $method->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 row">
              <div class="col-md-6">
                <label for="start_date" class="form-label">Start Date</label>
                <input class="form-control datepicker" id="start_date" name="start_date">
              </div>
              <div class="col-md-6">
                <label for="end_date" class="form-label">End Date</label>
                <input class="form-control datepicker" id="end_date" name="end_date">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="create_activity_submit">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Edit --}}
  <div class="modal fade" tabindex="-1" id="edit_activity_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Activity</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit_activity_form">
            <div class="mb-3">
              <label for="activity_name" class="form-label">Activity Name</label>
              <input class="form-control" id="edit_activity_name" name="name">
              <input type="hidden" id="edit_activity_id" name="id">
            </div>
            <div class="mb-3">
              <label for="activity_name" class="form-label">Method</label>
              <select name="method_id" id="edit_activity_method" class="form-select">
                <option>Select Method</option>
                @foreach ($methods as $method)
                  <option value="{{ $method->id }}">{{ $method->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 row">
              <div class="col-md-6">
                <label for="start_date" class="form-label">Start Date</label>
                <input class="form-control datepicker" id="edit_start_date" name="start_date">
              </div>
              <div class="col-md-6">
                <label for="end_date" class="form-label">End Date</label>
                <input class="form-control datepicker" id="edit_end_date" name="end_date">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="edit_activity_submit">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Delete --}}
  <div class="modal fade" tabindex="-1" id="delete_activity_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Activity</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure want to delete this activity?
          <form id="delete_activity_form">
            <input type="hidden" id="delete_activity_id" name="id">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="delete_activity_submit">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <script src="js/activity.js"></script>
</body>

</html>
