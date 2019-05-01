@extends('layouts.base')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="card">
              <div class="card-header">Chats</div>

              <div class="card-body">
                  <chat-messages :messages="messages"></chat-messages>
              </div>
              <div class="card-footer">
                  <chat-form
                      v-on:messagesent="addMessage"
                      :user="{{ Auth::user() }}"
                  ></chat-form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/app.js') }}" defer></script>   
@endsection