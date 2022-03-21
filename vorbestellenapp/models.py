from django.db import models

class Users(models.Model):
    user_id = models.AutoField(primary_key=True)
    username = models.CharField(max_length = 20, unique=True)
    password = models.CharField(max_length = 256)
    email = models.CharField(max_length = 50)
    first_name = models.CharField(max_length = 50, default="Not set")
    last_name = models.CharField(max_length = 50, default="Not set")
    contact = models.CharField(max_length = 20, default="Not set")
    barangay = models.CharField(max_length = 20, default="Not set")
    city = models.CharField(max_length = 20, default="Not set")
    status = models.CharField(max_length = 20, default="Incomplete")

    class meta:
        db_table = 'Users'

    def __str__(self):
        return self.username

class Rooms(models.Model):
    room_code = models.AutoField(primary_key=True)
    room_name = models.CharField(max_length = 20, unique=True)
    room_type = models.CharField(max_length = 20)
    image = models.ImageField(upload_to='images', null=True)

    class meta:
        db_table = 'Rooms'

    def __str__(self):
        return self.room_code

class Reservations(models.Model):
    reservation_id = models.AutoField(primary_key=True)
    room_name = models.ForeignKey(Rooms,to_field='room_name',on_delete = models.CASCADE)
    reserver_id = models.ForeignKey(Users,to_field='username',on_delete = models.CASCADE)
    contact = models.CharField(max_length = 20)
    time = models.CharField(max_length = 20)
    date = models.CharField(max_length = 50)
    reserver = models.CharField(max_length = 50)
    status = models.CharField(max_length = 20, default="Pending")
    payment = models.FloatField() 

    class meta:
        db_tale = 'Reservations'



