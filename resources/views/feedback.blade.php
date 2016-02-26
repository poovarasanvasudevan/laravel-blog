@extends("components.layout")

@section("contents")

    @include("components.toolbar")
    <div class="container" ng-controller="feedbackcontroller">

        <form ng-submit="feedbackSubmit()">
            <div class="col-md-12" id="feedback-layout" style="margin-top: 30px;">
                <div class="card md-padding">
                    <center><h2>Please Submit Your Feedback</h2></center>
                    <div class="form-group md-padding">
                        <label for="title">Title</label>
                        <input type="text" style="width: 100%;height: 40px;" class="form-control" id="title"
                               ng-model="feedback.title" required>
                    </div>
                    <div class="form-group md-padding">
                        <label for="description">Description</label>
                    <textarea
                            id="feedback-description"
                            ng-model="feedback.description"
                            name="feedback-description"
                            class="md-margin" required></textarea>
                    </div>


                    <div class="md-padding">
                    <span class="pull-right">
                        <lx-button type="submit" lx-color="blue" class="">Submit</lx-button>
                    </span>

                    </div>
                </div>
            </div>
        </form>


    </div>


@stop