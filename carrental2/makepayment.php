<?php
include_once 'header.php';
$bid = $_GET["bid"];
$bk = single("bookings", "bid=$bid");
extract($bk);
$bal = $billamount - $advance;
?>
<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center
    }

    .rating > input {
        display: none
    }

    .rating > label {
        position: relative;
        width: 1em;
        font-size: 35px;
        color: #3a25f7;
        cursor: pointer
    }

    .rating > label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating > label:hover:before,
    .rating > label:hover ~ label:before {
        opacity: 1 !important
    }

    .rating > input:checked ~ label:before {
        opacity: 1
    }

    .rating:hover > input:checked ~ label:before {
        opacity: 0.4
    }
</style>
<div class="container" style="min-height:79vh;">
    <div class="row">
    <div class="col-sm-6 mx-auto">
        <div class="card shadow my-3">
            <div class="card-body">
                <h5 class="text-center">Final Payment and Feedback</h5>
                <form method="POST" action="savepymt.php">
                    <input type="hidden" name="bid" value="<?= $bid ?>">            
                    <div class="form-group form-row mt-2">
                        <label class="col-sm-4">Balance Amount *</label>
                        <div class="col-sm-8">
                        <input type="text" name="amount" readonly value="<?= $bal ?>" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-4">Card No *</label>
                        <div class="col-sm-8">
                        <input type="text" name="cardno" maxlength="16" class="form-control form-control-sm">
                    </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-4">Name on card *</label>
                        <div class="col-sm-8">
                        <input type="text" name="nameoncard" class="form-control form-control-sm">
                    </div>
                    </div>

                    <div class="form-group form-row">
                        <label class="col-sm-4">Feedback *</label>
                        <div class="col-sm-8">
                        <textarea rows="4" placeholder="Feedback" name="feedback" class="form-control form-control-sm"></textarea>
                    </div>
                    </div>
                    <div class="form-row">
                        <label class="col-sm-3">Booking Rating</label>
                        <div class="col-sm-7">
                            <div class="rating">
                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-sm-3">Driver Rating </label>
                        <div class="col-sm-7">
                        <div class="rating">
                            <input type="radio" name="drating" value="5" id="51"><label for="51">☆</label>
                            <input type="radio" name="drating" value="4" id="41"><label for="41">☆</label>
                            <input type="radio" name="drating" value="3" id="31"><label for="31">☆</label>
                            <input type="radio" name="drating" value="2" id="21"><label for="21">☆</label>
                            <input type="radio" name="drating" value="1" id="11"><label for="11">☆</label>
                        </div>
                        </div>
                    </div>
                    <input type="submit" value="Make Payment" class="btn btn-success btn-sm">
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php include_once 'footer.php'; ?>