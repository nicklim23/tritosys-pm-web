@extends('layout.app')

@section('customstyle')
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                            Pending<br>Inspection Request
                                        </p>
                                        <h5 class="font-weight-bolder mt-2">
                                            10
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-curved-next text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                            Ongoing<br>Inspection Work
                                        </p>
                                        <h5 class="font-weight-bolder mt-2">
                                            6
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-spaceship text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Completed<br>Inspection Work</p>
                                        <h5 class="font-weight-bolder mt-2">
                                            30
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-like-2 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-lg-7 mt-3">
        <div class="col-xl-8">
          <div class="card card-calendar">
            <div class="card-body p-3">
              <div class="calendar" data-bs-toggle="calendar" id="calendar"></div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="row">
            <div class="col-xl-12 col-md-6 mt-xl-0 mt-4">
              <div class="card">
                <div class="card-header p-3 pb-0">
                  <h6 class="mb-0 text-sm">Upcoming Inspection</h6>
                </div>
                <div class="card-body border-radius-lg p-3">
                  <div class="d-flex">
                    <div>
                      <div class="icon icon-shape bg-warning-soft shadow text-center border-radius-md shadow-none">
                        <i class="ni ni-calendar-grid-58 text-lg text-warning text-gradient opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="ms-3">
                      <div class="numbers">
                        <h6 class="mb-1 text-dark text-sm">Building Inspection</h6>
                        <span class="text-sm">11 Nov 2022, at 12:30 PM</span>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mt-4">
                    <div>
                      <div class="icon icon-shape bg-warning-soft shadow text-center border-radius-md shadow-none">
                        <i class="ni ni-calendar-grid-58 text-lg text-warning text-gradient opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="ms-3">
                      <div class="numbers">
                        <h6 class="mb-1 text-dark text-sm">Piling Inspection</h6>
                        <span class="text-sm">13 Nov 2022, at 2:30 PM</span>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mt-4">
                    <div>
                      <div class="icon icon-shape bg-warning-soft shadow text-center border-radius-md shadow-none">
                        <i class="ni ni-calendar-grid-58 text-lg text-warning text-gradient opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="ms-3">
                      <div class="numbers">
                        <h6 class="mb-1 text-dark text-sm">Electrical Inspection</h6>
                        <span class="text-sm">15 Nov 2022, at 8:30 PM</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('pagespecificscripts')
<script src="{{asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
<script>
    var calendar = new FullCalendar.Calendar(document.getElementById("calendar"), {
      contentHeight: 'auto',
      initialView: "dayGridMonth",
      headerToolbar: {
        start: 'title', // will normally be on the left. if RTL, will be on the right
        center: '',
        end: 'today prev,next' // will normally be on the right. if RTL, will be on the left
      },
      selectable: false,
      editable: false,
      initialDate: '{{date('Y-m-d')}}',
      events: [
        {
          title: 'Building Inspection',
          start: '2022-11-11',
          end: '2022-11-11',
          className: 'bg-gradient-danger',
        },
        {
          title: 'Piling Inspection',
          start: '2022-11-13',
          end: '2022-11-13',
          className: 'bg-gradient-success'
        },
        {
          title: 'Electrical Inspection',
          start: '2022-11-15',
          end: '2022-11-15',
          className: 'bg-gradient-info'
        },

      ],
      views: {
        month: {
          titleFormat: {
            month: "long",
            year: "numeric"
          }
        },
        agendaWeek: {
          titleFormat: {
            month: "long",
            year: "numeric",
            day: "numeric"
          }
        },
        agendaDay: {
          titleFormat: {
            month: "short",
            year: "numeric",
            day: "numeric"
          }
        }
      },
    });

    calendar.render();
  </script>
@endsection