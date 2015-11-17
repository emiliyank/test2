<?php
	echo "Решение за TODO(име на проект)";

	echo validation_errors();

$hidden = array('project_id' => $project_id, 'student_course_id'=>$student_course_id);
echo form_open('students/project/add-solution-submit', $form_css, $hidden);
	echo '<div class="table-responsive">';
	echo "<table class='table table-striped col-md-8'>";
		echo "<tr> <td>";
		echo form_label('Решение (линк):', 'student_solution');
		echo "</td> <td>";
		echo form_input('student_solution', set_value('student_solution'), 'placeholder="https://drive.google.com/drive/my-file/view"');
		echo "</td> </tr> <tr> <td>";
		echo form_label('Финално решение ли е?', 'is_final');
		echo "</td> <td>";
		echo form_checkbox('is_final', '1', set_value('is_final'));
		echo "</td> </tr> <tr> <td>";
		echo form_submit('submit', 'Добави решение','class="btn btn-primary"');
		echo "</td> <td>";
		echo anchor("students/projects-list/$project_id/$student_course_id", 'Откажи', array('class' => 'btn btn-default'));
		echo "</td> </tr>";
	echo '</table>';
	echo '</div>';

/* End of file add_solution.php */
/* Location: ./application/views//students/add_solution.php */
