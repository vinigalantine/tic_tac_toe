<main class="h-100">
    <div class="container">
        <form id="form-board">
            <input type="hidden" id="id" name="id" value="">
            <!-- <input type="hidden" id="difficulty" name="difficulty" value="easy"> -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label for="difficulty">Difficulty</label>
                      <select class="form-control" name="difficulty" id="difficulty">
                        <option value="easy" selected>Easy</option>
                        <option value="intermediary">Intermediary</option>
                        <option value="hard">Hard</option>
                        <option value="ultra-hard" disabled title="Don't you dare enable this! ಠ_ಠ" >Ultra Hard</option>
                      </select>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="row">
                        <div style="height: 200px; border-style: solid; border-width: 0px 1px 1px 0px" class="col-4 hit-box">
                            <h1 class="h-100 d-flex justify-content-center align-items-center" id="text-one"></h1>
                            <input type="hidden" id="one" name="board[0][0]" value="">
                        </div>
                        <div style="height: 200px; border-style: solid; border-width: 0px 1px 1px 1px" class="col-4 hit-box">
                            <h1 class="h-100 d-flex justify-content-center align-items-center" id="text-two"></h1>
                            <input type="hidden" id="two" name="board[0][1]" value="">
                        </div>
                        <div style="height: 200px; border-style: solid; border-width: 0px 0px 1px 1px" class="col-4 hit-box">
                            <h1 class="h-100 d-flex justify-content-center align-items-center" id="text-three"></h1>
                            <input type="hidden" id="three" name="board[0][2]" value="">
                        </div>
                        <div style="height: 200px; border-style: solid; border-width: 1px 1px 1px 0px" class="col-4 hit-box">
                            <h1 class="h-100 d-flex justify-content-center align-items-center" id="text-four"></h1>
                            <input type="hidden" id="four" name="board[1][0]" value="">
                        </div>
                        <div style="height: 200px; border-style: solid; border-width: 1px 1px 1px 1px" class="col-4 hit-box">
                            <h1 class="h-100 d-flex justify-content-center align-items-center" id="text-five"></h1>
                            <input type="hidden" id="five" name="board[1][1]" value="">
                        </div>
                        <div style="height: 200px; border-style: solid; border-width: 1px 0px 1px 1px" class="col-4 hit-box">
                            <h1 class="h-100 d-flex justify-content-center align-items-center" id="text-six"></h1>
                            <input type="hidden" id="six" name="board[1][2]" value="">
                        </div>
                        <div style="height: 200px; border-style: solid; border-width: 1px 1px 0px 0px" class="col-4 hit-box">
                            <h1 class="h-100 d-flex justify-content-center align-items-center" id="text-seven"></h1>
                            <input type="hidden" id="seven" name="board[2][0]" value="">
                        </div>
                        <div style="height: 200px; border-style: solid; border-width: 1px 1px 0px 1px" class="col-4 hit-box">
                            <h1 class="h-100 d-flex justify-content-center align-items-center" id="text-eight"></h1>
                            <input type="hidden" id="eight" name="board[2][1]" value="">
                        </div>
                        <div style="height: 200px; border-style: solid; border-width: 1px 0px 0px 1px" class="col-4 hit-box">
                            <h1 class="h-100 d-flex justify-content-center align-items-center" id="text-nine"></h1>
                            <input type="hidden" id="nine" name="board[2][2]" value="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
            </div>
        </form>
    </div>
</main>