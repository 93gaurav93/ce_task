<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Ratings (You can update ratings)
                </h2>
            </div>
            <div class="body">
                <p class="lead">
                    <span class="user-id" hidden>{{$userId}}</span>
                    <span class="candidate-id" hidden>{{$columnsValues['id']}}</span>
                    <span class="csrf-token" hidden>{{csrf_token()}}</span>

                    <select id="example2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                    <h4 class="rating-status"></h4>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Id
                </h2>
            </div>
            <div class="body">
                <p class="lead">
                    @if(isset($columnsValues['id']) && $columnsValues['id'])
                        {{$columnsValues['id']}}
                    @else
                        Not Set
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>