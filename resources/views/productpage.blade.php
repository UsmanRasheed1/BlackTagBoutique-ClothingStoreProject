<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Product Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link href="{{ asset('css/navbar.css') }}" rel="stylesheet" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url('{{ asset("images/background.jpg") }}') center center/cover no-repeat;
      color: #fff;
      margin: 0;
      padding: 0;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .content {
      background-color: #383131;
      box-shadow: 0 0 10px rgba(177, 27, 27, 0.1);
      padding: 20px;
      margin-top: 20px;
      width: 100%;
      max-width: 800px;
      color: #fff;
    }

    .item {
      margin-bottom: 30px;
      border: 5px solid #ddd;
      padding: 10px;
      border-radius: 5px;
    }

    .colors-container .item {
      width: calc(35% - 20px);
      margin-right: 10px;
      margin-bottom: 10px;
      display: inline-block;
    }

    @media (max-width: 500px) {
      .colors-container .item {
        width: calc(30% - 10px);
      }
    }

    @media (max-width: 450px) {
      .colors-container .item {
        width: calc(80% - 20px);
        margin-right: 0;
      }
    }

    .colors-container input[type="radio"] {
      display: none;
    }

    .colors-container label {
      display: block;
      position: relative;
      cursor: pointer;
      border: 1px solid #ddd;
      border-radius: 3px;
      padding: 5px;
      color: #fff;
    }

    .colors-container label img {
      width: 100%;
      border-radius: 3px;
      border: 1px solid #ddd;
      opacity: 0.5;
      transform: scale(0.8);
      transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .colors-container input[type="radio"]:checked + label img {
      border: 3px solid black;
      opacity: 1;
      transform: scale(0.9);
    }

    .input-container {
      margin-bottom: 15px;
      text-align: center;
    }

    .input-container label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #fff;
    }

    .input-container input[type="number"],
    .input-container select {
      width: 20%;
      padding: 8px;
      margin: 0 auto;
    }

    .btn {
      background-color: #dc2d3a;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #e08696;
    }

    .btn:focus,
    .btn:active {
      background-color: #991d27 !important;
    }

    .radio-circle {
      margin-right: 10px;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      border: 2px solid white;
    }

    .color-radio:checked + .color-label .radio-circle {
      background-color: #e03367;
      border-color: #f7f7f7;
    }

    #reviewModal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    #reviewModal .modal-content {
      background: white;
      padding: 20px;
      border-radius: 8px;
      width: 400px;
      max-width: 90%;
    }

    .receipt {
  margin-bottom: 20px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
  color: black;
}
.receipt p {
  margin: 5px 0;
}
.receipt hr {
  margin: 10px 0;
  border: none;
  border-top: 1px dashed #ccc;
}
.receipt .total {
  font-weight: bold;
}
hr.dashed-line {
  border: none;
  border-top: 4px dashed rgb(0, 0, 0);
  height: 0;
  margin: 20px 0;
}

  </style>
</head>
<body>
@include('component.navbar')

<div class="container">
  <h2 style="color: #fff; margin-bottom: 10px;">{{ $clothes_name }}</h2>
  <div class="content">
    <form action="/addtocart" method="POST">
      @csrf

      <div class="form-group input-container">
        <label for="color" style="color: #dc3545;">Select Color:</label>
        <div class="colors-container">
          @foreach ($colors as $color)
          <div class="item">
            <input type="radio" name="color" value="{{ $color->Color }}" id="{{ $color->Color }}" class="color-radio">
            <label for="{{ $color->Color }}" class="color-label" style="color: {{ $color->Color === 'Blue' ? 'LightBlue' : $color->Color }};">
              <div class="radio-circle"></div>
              <img src="{{ asset('images/' . $color->picture) }}" alt="{{ $color->Color }}" class="img-fluid" loading="lazy">
              {{ $color->Color }}
            </label>
          </div>
          @endforeach
        </div>
      </div>

      <div class="form-group input-container">
        <label for="size" style="color: #dc3545;">Select Size:</label>
        <select id="size" name="size" class="form-control">
          <option value="XS">XS</option>
          <option value="S">S</option>
          <option value="M">M</option>
          <option value="L">L</option>
          <option value="XL">XL</option>
        </select>
      </div>

      <div class="form-group input-container">
        <label for="quantity" style="color: #dc3545;">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="100" value="1" class="form-control">
      </div>

      <div class="form-group d-flex justify-content-center gap-2 flex-wrap">
        <input type="submit" value="Add to Cart" class="btn btn-primary">
        <button type="button" id="openReviewBtn" class="btn btn-primary">Write a Review</button>
      </div>

      <input type="hidden" name="email" value="{{ $email }}">
      <input type="hidden" name="Clothesid" value="{{ $Clothesid }}">
      <input type="hidden" name="clothes_name" value="{{ $clothes_name }}">
      <input type="hidden" name="Price" value="{{ $Price }}">
    </form>

    <!-- Review Modal -->
    <div id="reviewModal">
      <div class="modal-content">
        <h3>Write a Review</h3>
        <form id="reviewForm" method="POST" action="/submitareview">
          @csrf
          <input type="hidden" name="Clothesid" value="{{ $Clothesid }}">
          <input type="hidden" name="email" value="{{ $email }}">
          <div class="form-group">
            <textarea name="review" rows="4" class="form-control" placeholder="Write your review here..." required></textarea>
          </div>
          <br>
          <button type="submit" class="btn btn-success">Submit Review</button>
          <button type="button" id="closeReviewBtn" class="btn btn-secondary">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>



@if ($reviews && $reviews->isNotEmpty())
<div class="container">
  <div class="content">
    <h3 class="mt-4" style="color: #fff;">Customer Reviews</h3>

    @php
        $groupedReviews = $reviews->groupBy('sentiment');
    @endphp

    @foreach (['Positive' => 'Positive Reviews', 'Neutral' => 'Neutral Reviews', 'Negative' => 'Negative Reviews'] as $sentiment => $label)
      @if ($groupedReviews->has($sentiment))
        <h4 style="color: #ffc107; margin-top: 20px;">{{ $label }}</h4>
        @foreach ($groupedReviews[$sentiment] as $review)
          <div class="receipt">
            <p><strong>User:</strong> {{ $review->email }}</p>
            <p><strong>Review:</strong> {{ $review->reviewtext }}</p>
            <hr class="dashed-line">
            <p class="total"><strong>Date:</strong> {{ \Carbon\Carbon::parse($review->reviewdate)->format('F j, Y, g:i a') }}</p>
          </div>
        @endforeach
      @endif
    @endforeach
  </div>
</div>
@endif


@include('component.footer')

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
  window.onload = function () {
    const radios = document.querySelectorAll('.color-radio');
    if (radios.length > 0) radios[0].checked = true;
  };

  const openBtn = document.getElementById('openReviewBtn');
  const closeBtn = document.getElementById('closeReviewBtn');
  const modal = document.getElementById('reviewModal');

  openBtn.addEventListener('click', (e) => {
    e.preventDefault();
    modal.style.display = 'flex';
  });

  closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  window.addEventListener('click', (e) => {
    if (e.target == modal) {
      modal.style.display = 'none';
    }
  });
</script>
</body>
</html>
