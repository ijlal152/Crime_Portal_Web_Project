import 'dart:convert';
import 'dart:io';
import 'dart:typed_data';
import 'package:cross_file_image/cross_file_image.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart' show rootBundle;
import 'package:path_provider/path_provider.dart';

void main() {
  runApp(const MyApp());
}


class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: MyHomePage(),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key? key}) : super(key: key);

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  Future<File> getImageFileFromAssets(String path) async {
    final byteData = await rootBundle.load('assets/$path');

    final file = File('${(await getTemporaryDirectory()).path}/$path');
    await file.writeAsBytes(byteData.buffer
        .asUint8List(byteData.offsetInBytes, byteData.lengthInBytes));

    return file;
  }

  File? f;
  String basestring = '';

//File f = await getImageFileFromAssets('stackoverflow.png');
  showimage() async {
    f = await getImageFileFromAssets('stackoverflow.png');
    print('image converted successfully');
    print(f);
    Uint8List imagebytes = await f!.readAsBytes();
    print(imagebytes);
    basestring = base64.encode(imagebytes);
    print(basestring);
  }

  Widget showImage(BuildContext context){
    return Container(
      decoration: BoxDecoration(
        image: DecorationImage(image: MemoryImage(base64Decode(basestring)))
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text('Image'),
          centerTitle: true,
        ),
        body: Column(
          children: <Widget>[
            SizedBox(height: 30,),
            Center(
              child: ElevatedButton(
                onPressed: () {
                  showimage();
                },
                child: Text('Click me'),
              ),
            ),
            Expanded(
              child: Center(
                child: f != null ? showImage(context) : Container(child: Text('no image'),),
              )
            )
          ],
        ));
  }
}
