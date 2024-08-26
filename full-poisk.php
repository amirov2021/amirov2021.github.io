<div class="container">
<form action="search.php" method="get">
	<div class="row ml-3">
		<div class="col-6">
			<div class="row mb-3">
				<div class="col-4">
					<label for="fp-familiya" class="col-form-label">Фамилия:</label>
				</div>
				<div class="col-8">
					<input type="text" name="fp-familiya" class="form-control">
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-4">
					<label for="fp-imya" class="col-form-label">Имя:</label>
				</div>
				<div class="col-8">
					<input type="text" name="fp-imya" class="form-control">
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-4">
					<label for="fp-otchestvo" class="col-form-label">Отчество:</label>
				</div>
				<div class="col-8">
					<input type="text" name="fp-otchestvo" class="form-control">
				</div>
			</div>
			
					
		</div>
		<div class="col-6">
			<div class="row mb-3">
				<div class="col-4">
					<label for="fp-phone" class="col-form-label">Номер телефона:</label>
				</div>
				<div class="col-8">
					<input type="text" name="fp-phone" class="form-control">
				</div>
			</div>	
			<div class="row mb-3">
				<div class="col-4">
					<label for="fp-nomdog" class="col-form-label">№ договора:</label>
				</div>
				<div class="col-8">
					<input type="text" name="fp-nomdog" class="form-control">
				</div>
			</div>
					
		</div>	
	</div>

	<!--Кнопки-->
	<div class="row ml-3 mb-3 text-center">
		<div class="col">
			<button type="submint" class="btn btn-primary mr-1">Поиск</button>
			<button type="button" class="btn btn-info mr-1">Сбросить</button>	
			<button type="button" class="btn btn-outline-dark" value="zakrit" name="full-poisk" onclick="full_poisk(this.value)">Закрыть окно поиска</button>
		</div>
	</div>					
</form>
</div>



