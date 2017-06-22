function People(name, age){
	this.name = name;
	this.age = age;
	this.message = function(){
		console.log(this.name + '  ' + this.age);
	}
}
var student = new People('wang', '24');
student.message();
console.log(student);

student.__proto__.con = function(){
	alert('1');
};
