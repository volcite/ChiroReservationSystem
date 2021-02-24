<!-- cancelボタン -->
<a href="#cancel" role="button" data-toggle="modal" class="link_cancel col-5 col-md-3">予約キャンセル</a>

<!-- cancel modal -->
<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label1">予約キャンセル</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="font-weight-bold">{{ $reservation->reservation_date->format('Y年m月d日') }} {{ $reservation->time->time_number }}</p>
        <p>コース名： {{ $reservation->course->course_name }}</p>
        <p>{{ $reservation-> name }} 様</p>
      </div>
      <div class="modal-footer">
        <small>予約キャンセルされますか？</small>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
        <button type="button" class="btn link_cancel">
          <a href="{{ route('admin.deleteReserve', ['id' => $reservation->id]) }}" style="color: #000000">予約キャンセル</a>
        </button>

      </div>
    </div>
  </div>
</div>
<!-- cancel modal -->