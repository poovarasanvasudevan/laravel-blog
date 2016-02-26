@extends("components.layout")

@section("contents")

    <div class="card">
        <div class="toolbar">

        </div>
    </div>


    <div class="login-box" ng-controller="logincontroller">

        <row centered>
            <column cols="4">
                <form name="login-form" ng-submit="submit()" id="login-form" method="post"
                      class="md-padding">

                    {!! Html::image("img/logo.png","logo",["class"=>"center-block img-responsive","disabled"=>"disabled"]) !!}
                    <br/>

                    <div class="md-margin card marginL20 marginR20">
                        <div class="md-padding">


                            <lx-text-field lx-label="Email or Abyasi Id" lx-fixed-label="true" lx-icon="account">
                                <input type="text" ng-model="input.username" required>
                            </lx-text-field>
                            <lx-text-field lx-label="Password" lx-fixed-label="true" lx-icon="eye">
                                <input type="password" ng-model="input.password" required>
                            </lx-text-field>

                            <div class="md-padding">
                                <div class="pull-left">
                                    <lx-checkbox id="checkbox1" ng-model="input.rememberme" lx-color="blue"
                                                 style="margin-top: 5px;" class="mt+ marginL20">Remember me
                                    </lx-checkbox>
                                </div>

                                <div class="pull-right">
                                    <br/>
                                    <lx-button type="submit" lx-color="blue">Login</lx-button>
                                </div>

                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <center><span>[[message]]</span></center>
                        </div>
                    </div>
                </form>
            </column>
        </row>
    </div>
@stop