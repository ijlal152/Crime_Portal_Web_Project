import 'package:sqflite/sqflite.dart';
import 'package:path/path.dart';

class DbHelper{
  static Database? _db;
  static const String DB_Name = 'photo.db';
}