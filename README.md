# bulletinBoard_PHP

PHPを使った掲示板作成です
フレームワークを使いません

【フルスタックで掲示板を作る】

* フルスクラッチで開発する
* ログイン、テキスト投稿、画像投稿、本人による投稿の削除ができる掲示板を作成する
* ユーザのメールアドレスは一意である
* ユーザは140文字以内の任意のテキストを投稿できる
* ユーザが入力したテキストや画像の他、投稿日時を表示する
* 各投稿には、投稿時と同様の条件でコメントがつけられる

掲示板とは

記事を書き込んだり、閲覧したり、コメント（レス）を付けられるようにした仕組み

＿＿＿＿＿＿＿＿＿

https://gray-code.com/php/make-the-board-vol1/

＿＿＿＿＿＿＿＿＿

何の掲示板にするか

イヌやネコについて、簡単にコメントができる掲示板

定義
	~という機能をつけたい
調査
	phpで〜を実装する方法をネットで調べる
実装
	発見した方法をコードで書く
修正
	エラーが出たら修正したり改造したりする
 
＿＿＿＿＿＿＿＿＿

ステップ1 issueを作成する 

    自分のGitHubのページにログイン→個人開発しているリポジトリに行く→issueページへ

    新しいissueを作成します。「New　issue」をクリック
    
    GitHubページのissueの作成はいつでもできるので、思いついたらとりあえず追加しておくと良いと思います。
   
⓵まずタイトルを書く（自分だけなので、最低限自分が分かればいい）

     オススメは細かくissue追加するです。
     なぜなら、コミットが多い分自分のページの青芝が増えますし、達成感も強いからです。

⓶詳細を書きます。雑でも良いのですが（例は雑です。）
    詳細を書くときのコツは
      ・現状どうなっているのか。何を不満に思っているのか。
      ・どうしたいのか（参考リンクを貼るのもいいと思います。）
      ・今の所考えている解決策を一応書く。
    →このissueの全体の流れと着手のハードルを下げることができるため。

⓷確認して良ければ、『Submit new issue』ボタンを押す。（編集、削除できます）

『Submit new issue』を押す
このタブを残して開発をしたり、メモったりなど、『#数字』が何番かを忘れないようにしてください。
後のコミットをする際に使用します。

＿＿＿＿＿＿＿＿＿

ステップ2 新しいブランチを作り、pushする

    ターミナルを開き、issueをしたいディレクトリに移動し、ブランチがmasterになっていることを確認してください。
    一旦、準備はこれで終わったので、もくもくとissueに対応する作業をする。脱線しないように！

＿＿＿＿＿＿＿＿＿

ステップ3 作業が終わったら、ステージ→コミット→プッシュする
    これは普段から行っている方も多いと思いますが、ステージ→コミット→作ったブランチに向かってプッシュをしてください。
    ここでも一点注意。
    コミットメッセージに必ず#番号を書いてください。
    コミットメッセージの中の#番号とGitHubが紐付いているからです。
    
    //ステージする
    $ git add .

    //コミットする。このとき#番号を忘れずに！！
    $ git commit -m “コメント#”

    //プッシュする。先ほどのブランチ名に
    $ git push origin ブランチ名

＿＿＿＿＿＿＿＿

ステップ4 プルリクエストを送り、自分でマージする

    ここからプルリクエストを送っていきます。
    本来はプルリクエストを送る相手は自分のコードを見てもらう人（プロダクトマネージャーなど）に送ります。
    とは言え、今回は自分に対してですが。
    しっかりと番号を記載して、コミットできれば、GitHubのリポジトリに下のような表示がされていると思います。
    
     ボタンを押すと、またタイトルと詳細を書く画面が出てきます。
     タイトルや詳細はわかりやすいものであれば、何でも良いです。

     一点だけ注意してもらいたいことは、
     このタスクを完了する場合は、詳細に『close#番号』を書きましょう。
     これでissueが自動的にタスク完了と見なして、処理してくれます。
     （これを書かないとタスクが未完了とみなされます。）
     
     確認して良ければ、『Create pull request』ボタンを押し、その後「confirm」を押します。
     これでプルリクエストは完了（提出が完了）したので、ここからはマージです。
     
     マージは管理者（プロダクトマネージャー）がコードを確認して、良ければ源流に繋がる役割があります。
     簡単に言えば、チェックですね。
     とは言え、これも個人開発では自分がマージすることになります。
     最初は黄色ですが、エラーがなければ、緑色になりマージできる環境になります。
     
     上が『Merged』となり、紫色になれば無事完了です。
     一つのissueが完了ということになります。
     
__________

ステップ5 マスターに戻り、プルをして全体に反映させる

     マージは完了しましたが、まだ源流は反映されていません。
     反映させるために、マスターに戻って、プルしてきます。
     こうすることで、マージされた新しいコードが反映されます。
     簡単に言えば、アップデートされるわけです。
     
     //ブランチをマスターに切り替える
     $ git checkout master

     //マスターにマージされた内容を反映させるプル
     $ git pull
     
     ここまでで一つのissueの全ての工程が終了です。
     またSTEP１に戻って、新しいissueを作成してください。
