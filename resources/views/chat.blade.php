@extends("layout.chat.layoutMasterChat")

@section("title", "Chat")
@section("content")
@include("include.side-bar-menu")
<main>
    @include("include.header")
    <section id="chat">
        <div class="content-wrapper">

            <!-- Row start -->
            <div class="row gutters">
    
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    
                    <div class="card m-0">
    
                        <!-- Row start -->
                        <div class="row no-gutters">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                                <div class="users-container">
                                    <div class="chat-search-box">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-info">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="users">
                                        <li class="person" data-chat="person1">
                                            <div class="user">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                <span class="status busy"></span>
                                            </div>
                                            <p class="name-time">
                                                <span class="name">EL LUIS</span>
                                                <span class="time">15/02/2019</span>
                                            </p>
                                        </li>
                                        <li class="person" data-chat="person1">
                                            <div class="user">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar1.png" alt="Retail Admin">
                                                <span class="status offline"></span>
                                            </div>
                                            <p class="name-time">
                                                <span class="name">EL LUIGI</span>
                                                <span class="time">15/02/2019</span>
                                            </p>
                                        </li>
                                        <li class="person active-user" data-chat="person2">
                                            <div class="user">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar2.png" alt="Retail Admin">
                                                <span class="status away"></span>
                                            </div>
                                            <p class="name-time">
                                                <span class="name">BENITO</span>
                                                <span class="time">12/02/2019</span>
                                            </p>
                                        </li>
                                        <li class="person" data-chat="person3">
                                            <div class="user">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                <span class="status busy"></span>
                                            </div>
                                            <p class="name-time">
                                                <span class="name">GONZALO</span>
                                                <span class="time">11/02/2019</span>
                                            </p>
                                        </li>
                                        <li class="person" data-chat="person4">
                                            <div class="user">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar4.png" alt="Retail Admin">
                                                <span class="status offline"></span>
                                            </div>
                                            <p class="name-time">
                                                <span class="name">YURIMICTRIXI</span>
                                                <span class="time">08/02/2019</span>
                                            </p>
                                        </li>
                                        <li class="person" data-chat="person5">
                                            <div class="user">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar5.png" alt="Retail Admin">
                                                <span class="status away"></span>
                                            </div>
                                            <p class="name-time">
                                                <span class="name">EL CULO</span>
                                                <span class="time">05/02/2019</span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                                <div class="selected-user">
                                    <span>To: <span class="name">LA SHIRLEY</span></span>
                                </div>
                                <div class="chat-container">
                                    <ul class="chat-box chatContainerScroll">
                                        <li class="chat-left">
                                            <div class="chat-avatar">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                <div class="chat-name">SHIRLEY</div>
                                            </div>
                                            <div class="chat-text">Hello
                                                <br>How can I help you today?</div>
                                            <div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div>
                                        </li>
                                        
                                    </ul>
                                    <div class="form-group mt-3 mb-0">
                                        <textarea class="form-control" rows="3" placeholder="Type your message here..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>
    
                </div>
    
            </div>
            <!-- Row end -->
    
        </div>
    </section>
</main>

@endsection

